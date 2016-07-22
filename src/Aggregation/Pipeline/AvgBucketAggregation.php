<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Aggregation\Pipeline;

use ONGR\ElasticsearchDSL\Aggregation\AbstractAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Type\MetricTrait;

/**
 * Class representing Avg Bucket Pipeline Aggregation.
 *
 * @link https://goo.gl/SWK2nP
 */
class AvgBucketAggregation extends AbstractAggregation
{
    use MetricTrait;

    /**
     * @var string
     */
    private $bucketsPath;

    /**
     * @param string $name
     * @param $bucketsPath
     */
    public function __construct($name, $bucketsPath = null)
    {
        parent::__construct($name);

        if ($bucketsPath) {
            $this->setBucketsPath($bucketsPath);
        }
    }

    /**
     * @return string
     */
    public function getBucketsPath()
    {
        return $this->bucketsPath;
    }

    /**
     * @param string $bucketsPath
     */
    public function setBucketsPath($bucketsPath)
    {
        $this->bucketsPath = $bucketsPath;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'avg_bucket';
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        if (!$this->getBucketsPath()) {
            throw new \LogicException('Avg bucket aggregation must have buckets_field set.');
        }

        return ['buckets_path' => $this->getBucketsPath()];
    }
}
