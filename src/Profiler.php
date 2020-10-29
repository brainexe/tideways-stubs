<?php
declare(strict_types=1);

namespace Tideways;

use Tideways\Traces\NullSpan;
use Tideways\Traces\Span;

/**
 * Tideways PHP API
 *
 * Contains all methods to gather measurements and profile data with
 * Xhprof and send to local Profiler Collector Daemon.
 *
 * This class is intentionally monolithic and static to allow
 * users to easily copy it into their projects or auto-prepend PHP
 * scripts.
 *
 * @example
 *
 *      Tideways\Profiler::start($apiKey);
 *      Tideways\Profiler::setTransactionName("my tx name");
 *
 * Calling the {@link stop()} method is not necessary as it is
 * called automatically from a shutdown handler, if you are timing
 * worker processes however it is necessary:
 *
 *      Tideways\Profiler::stop();
 *
 * The method {@link setTransactionName} is required, failing to call
 * it will result in discarding of the data.
 */
class Profiler
{

    /**
     * Configure detecting framework transactions and ignoring unnecessary layer calls.
     *
     * If the framework is not from the list of known frameworks it is assumed to
     * be a function name that is the transaction function.
     *
     * @param string $framework
     */
    public static function detectFramework($framework): void
    {
    }

    /**
     * Add more ignore functions to profiling options.
     *
     * @param array<string> $functionNames
     * @return void
     */
    public static function addIgnoreFunctions(array $functionNames): void
    {
    }

    /**
     * Start production profiling for the application.
     *
     * There are three modes for profiling:
     *
     * 1. Wall-time only profiling of the complete request (no overhead)
     * 2. Full profile/trace using xhprof (depending of # function calls
     *    significant overhead)
     * 3. Whitelist-profiling mode only interesting functions.
     *    (5-40% overhead, requires custom xhprof version >= 0.95)
     *
     * Decisions to profile are made based on a sample-rate and random picks.
     * You can influence the sample rate and pick a value that suites your
     * application. Applications with lower request rates need a much higher
     * transaction rate (25-50%) than applications with high load (<= 1%).
     *
     * Factors that influence sample rate:
     *
     * 1. Second parameter $sampleRate to start() method.
     * 2. _tideways Query Parameter (string key is deprecated or array)
     * 3. Cookie TIDEWAYS_SESSION
     * 4. TIDEWAYS_SAMPLERATE environment variable.
     * 5. X-TIDEWAYS-PROFILER HTTP header
     *
     * start() automatically invokes a register shutdown handler that stops and
     * transmits the profiling data to the local daemon for further processing.
     *
     * @param array|string      $options Either options array or api key (when string)
     * @param int               $sampleRate Deprecated, use "sample_rate" key in options instead.
     */
    public static function start($options = array(), $sampleRate = null): void
    {
    }

    public static function setTransactionName($name): void
    {
    }

    public static function setServiceName($name): void
    {
    }

    public static function isStarted(): bool
    {
        return false;
    }

    public static function isProfiling(): bool
    {
        return false;
    }

    /**
     * Returns true if profiler is currently tracing spans.
     *
     * This can be used to check if adding X-TW-* HTTP headers makes sense.
     *
     * @return bool
     */
    public static function isTracing(): bool
    {
        return false;
    }

    /**
     * Add a custom variable to this profile.
     *
     * Examples are the Request URL, UserId, Correlation Ids and more.
     *
     * Please do *NOT* set private data in custom variables as this
     * data is not encrypted on our servers.
     *
     * Only accepts scalar values.
     *
     * The key 'url' is a magic value and should contain the request
     * url if you want to transmit it. The Profiler UI will specially
     * display it.
     *
     * @param string $name
     * @param scalar $value
     * @return void
     */
    public static function setCustomVariable($name, $value): void
    {
    }

    /**
     * Watch a function for calls and create timeline spans around it.
     *
     * @param string $function
     * @param string $category
     */
    public static function watch($function, $category = null): void
    {
    }

    /**
     * Watch a function and invoke a callback when its called.
     *
     * To start a span, call {@link \Tideways\Profiler::createSpan($category)}
     * inside the callback and return {$span->getId()}:
     *
     * @example
     *
     * \Tideways\Profiler::watchCallback('mysql_query', function ($context) {
     *     $span = \Tideways\Profiler::createSpan('sql');
     *     $span->annotate(array('title' => $context['args'][0]));
     *     return $span->getId();
     * });
     */
    public static function watchCallback($function, $callback): void
    {
    }

    /**
     * Create a new trace span with the given category name.
     *
     * @example
     *
     *  $span = \Tideways\Profiler::createSpan('sql');
     *
     * @return Span
     */
    public static function createSpan($name): Traces\Span
    {
        return new NullSpan();
    }

    /**
     * Stop all profiling actions and submit collected data.
     */
    public static function stop(): void
    {
    }

    public static function logFatal($message, $file, $line, $type = null, $trace = null): void
    {
    }

    public static function logException($exception): void
    {
    }

    public static function enableCallgraphProfiler(): void
    {
    }

    public static function enableTracingProfiler(): void
    {
    }

    public static function addEventMarker(string $name): void
    {
    }

}
