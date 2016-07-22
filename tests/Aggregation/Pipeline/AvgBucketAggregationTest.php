<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Tests\Aggregation\Pipeline;

use ONGR\ElasticsearchDSL\Aggregation\Pipeline\AvgBucketAggregation;

/**
 * Unit test for avg_bucket aggregation.
 */
class AvgBucketAggregationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests getArray method.
     */
    public function testGetArray()
    {
        $aggregation = new AvgBucketAggregation('foo', 'foo>bar');

        $this->assertEquals(['buckets_path' => 'foo>bar'], $aggregation->getArray());
    }

    /**
     * Tests getType method.
     */
    public function testAvgBucketAggregationGetType()
    {
        $aggregation = new AvgBucketAggregation('foo', 'foo>bar');
        $this->assertEquals('avg_bucket', $aggregation->getType());
    }

    /**
     * Tests if the exception is thrown in getArray method if no
     * buckets_path is set
     *
     * @expectedException \LogicException
     * @expectedExceptionMessage Avg bucket aggregation must have buckets_field set.
     */
    public function testGetArrayException()
    {
        $agg = new AvgBucketAggregation('test');

        $agg->getArray();
    }
}
