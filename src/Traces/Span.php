<?php
declare(strict_types=1);

namespace Tideways\Traces;

abstract class Span
{
    /**
     * 32/64 bit random integer.
     *
     * @return int
     */
    abstract public function getId();

    /**
     * Record start of timer in microseconds.
     *
     * If timer is already running, don't record another start.
     */
    abstract public function startTimer();

    /**
     * Record stop of timer in microseconds.
     *
     * If timer is not running, don't record.
     */
    abstract public function stopTimer();

    /**
     * Annotate span with metadata.
     *
     * @param array<string,scalar>
     */
    abstract public function annotate(array $annotations);
}