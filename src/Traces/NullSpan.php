<?php
declare(strict_types=1);

namespace Tideways\Traces;

class NullSpan extends Span
{
    public function createSpan($name = null)
    {
        return $this;
    }

    public function getSpans()
    {
        return [];
    }

    public function getId()
    {
        return 0;
    }
    /**
     * Record start of timer in microseconds.
     *
     * If timer is already running, don't record another start.
     */
    public function startTimer()
    {
    }

    /**
     * Record stop of timer in microseconds.
     *
     * If timer is not running, don't record.
     */
    public function stopTimer()
    {
    }

    /**
     * Annotate span with metadata.
     *
     * @param array
     */
    public function annotate(array $annotations)
    {
    }
}
