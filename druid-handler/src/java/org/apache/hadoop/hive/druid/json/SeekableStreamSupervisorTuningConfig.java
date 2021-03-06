/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package org.apache.hadoop.hive.druid.json;

import com.fasterxml.jackson.annotation.JsonProperty;
import org.joda.time.Duration;
import org.joda.time.Period;

/**
 * This class is copied from druid source code
 * in order to avoid adding additional dependencies on druid-indexing-service.
 */
public interface SeekableStreamSupervisorTuningConfig {

  int DEFAULT_CHAT_RETRIES = 8;
  String DEFAULT_HTTP_TIMEOUT = "PT10S";
  String DEFAULT_SHUTDOWN_TIMEOUT = "PT80S";
  String DEFAULT_REPARTITION_TRANSITION_DURATION = "PT2M";

  static Duration defaultDuration(final Period period, final String theDefault) {
    return (period == null ? new Period(theDefault) : period).toStandardDuration();
  }

  @JsonProperty
  Integer getWorkerThreads();

  @JsonProperty
  Integer getChatThreads();

  @JsonProperty
  Long getChatRetries();

  @JsonProperty
  Duration getHttpTimeout();

  @JsonProperty
  Duration getShutdownTimeout();

  @JsonProperty
  Duration getRepartitionTransitionDuration();

  SeekableStreamIndexTaskTuningConfig convertToTaskTuningConfig();
}
