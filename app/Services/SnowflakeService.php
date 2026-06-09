<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class SnowflakeService
{
    // 纪元起始时间：2024-01-01 00:00:00 UTC
    private const EPOCH = 1704067200000;

    // 各部分的位数
    private const WORKER_ID_BITS = 5;     // 工作机器ID占5位
    private const DATACENTER_ID_BITS = 5; // 数据中心ID占5位
    private const SEQUENCE_BITS = 12;     // 序列号占12位

    // 各部分的最大值
    private const MAX_WORKER_ID = -1 ^ (-1 << self::WORKER_ID_BITS);
    private const MAX_DATACENTER_ID = -1 ^ (-1 << self::DATACENTER_ID_BITS);

    // 各部分左移位数
    private const WORKER_ID_SHIFT = self::SEQUENCE_BITS;
    private const DATACENTER_ID_SHIFT = self::SEQUENCE_BITS + self::WORKER_ID_BITS;
    private const TIMESTAMP_SHIFT = self::SEQUENCE_BITS + self::WORKER_ID_BITS + self::DATACENTER_ID_BITS;

    // 序列号掩码
    private const SEQUENCE_MASK = -1 ^ (-1 << self::SEQUENCE_BITS);

    private int $workerId;
    private int $datacenterId;
    private int $sequence = 0;
    private int $lastTimestamp = -1;

    public function __construct(int $workerId = 1, int $datacenterId = 1)
    {
        if ($workerId > self::MAX_WORKER_ID || $workerId < 0) {
            throw new \InvalidArgumentException("Worker ID 必须在 0 到 " . self::MAX_WORKER_ID . " 之间");
        }
        if ($datacenterId > self::MAX_DATACENTER_ID || $datacenterId < 0) {
            throw new \InvalidArgumentException("Datacenter ID 必须在 0 到 " . self::MAX_DATACENTER_ID . " 之间");
        }

        $this->workerId = $workerId;
        $this->datacenterId = $datacenterId;
    }

    /**
     * 生成下一个唯一 ID
     */
    public function nextId(): int
    {
        $timestamp = $this->currentTimestamp();

        if ($timestamp < $this->lastTimestamp) {
            throw new \RuntimeException('时钟回拨，拒绝生成 ID');
        }

        if ($timestamp === $this->lastTimestamp) {
            $this->sequence = ($this->sequence + 1) & self::SEQUENCE_MASK;
            if ($this->sequence === 0) {
                $timestamp = $this->waitNextTimestamp();
            }
        } else {
            $this->sequence = 0;
        }

        $this->lastTimestamp = $timestamp;

        return (($timestamp - self::EPOCH) << self::TIMESTAMP_SHIFT)
            | ($this->datacenterId << self::DATACENTER_ID_SHIFT)
            | ($this->workerId << self::WORKER_ID_SHIFT)
            | $this->sequence;
    }

    /**
     * 生成字符串格式的 UID（便于存储和展示）
     */
    public function generateUid(): string
    {
        return (string) $this->nextId();
    }

    /**
     * 获取当前毫秒时间戳
     */
    private function currentTimestamp(): int
    {
        return (int) (microtime(true) * 1000);
    }

    /**
     * 等待下一毫秒
     */
    private function waitNextTimestamp(): int
    {
        $timestamp = $this->currentTimestamp();
        while ($timestamp <= $this->lastTimestamp) {
            $timestamp = $this->currentTimestamp();
        }
        return $timestamp;
    }
}
