

                                                        @if (count($assessments) > 0)
                                                            @foreach ($assessments as $index => $assessment)

                                                                @if ($assessment->assessment_label_id == $assessmentLabel->id)


                                                                    <div id="accordion{{ $index }}" role="tablist">
                                                                        <div class="card card-collapse">
                                                                            <div class="card-header" role="tab"
                                                                                id="heading{{ $index }}">
                                                                                <h5 class="mb-0">
                                                                                    <a data-toggle="collapse"
                                                                                        href="#collapse{{ $index }}"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapse{{ $index }}">
                                                                                        {{ $assessment->name }}
                                                                                        <i
                                                                                            class="material-icons">keyboard_arrow_down</i>
                                                                                    </a>
                                                                                </h5>
                                                                            </div>

                                                                            <form action="{{url('assessment-update')}}" method="POST">
                                                                              @csrf

                                                                              <input type="hidden" name="parent_id" value=" {{$assessment->id}}" >
                                                                              <input type="hidden" name="assessment_type_id" value="{{$assessmentLabel->assessment_type_id}}">
                                                                              <input type="hidden" name="assessment_label_id" value="{{$assessmentLabel->id}}">

                                                                           

                                                                            <div id="collapse{{ $index }}"
                                                                                class="collapse collapseBody"
                                                                                role="tabpanel"
                                                                                aria-labelledby="heading{{ $index }}"
                                                                                data-parent="#accordion{{ $index }}">
                                                                                <div class="card-body rowBody">
                                                                                    @if ($assessment->child)
                                                                                        @foreach ($assessment->child as $chi)
                                                                                            <div class="row">
                                                                                                <div class="col-md-7">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="name[{{$chi->id}}]"
                                                                                                        value="{{ $chi->name }}">
                                                                                                </div>
                                                                                                <div class="col-md-5">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-danger removeBtn">Remove</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach


                                                                                    @endif
                                                                                </div>

                                                                                <button class="btn btn-info addNewBtn"
                                                                                    type="button">Add New</button>
                                                                                <button class="btn btn-success updateBtn"
                                                                                    type="submit">Save</button>

                                                                            </div>

                                                                          </form>


                                                                        </div>
                                                                    </div>

                                                                @else
                                                                @endif


                                                            @endforeach
                                                        @endif
