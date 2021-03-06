<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

namespace Spiral\Jobs\Configs;

use Spiral\Core\InjectableConfig;

class JobsConfig extends InjectableConfig
{
    const CONFIG = 'jobs';

    /**
     * @var array
     */
    protected $config = [
        // Association between jobs and pipelines
        'pipelines'       => [
            // JobClass::class => "rabbitmq"
        ],
        'default' => 'local'
    ];

    /**
     * Return pipeline associated with the Job.
     *
     * @param string $job
     *
     * @return string
     */
    public function jobPipeline(string $job): string
    {
        if (isset($this->config['pipelines'][$job])) {
            return $this->config['pipelines'][$job];
        }

        return $this->config['default'];
    }
}