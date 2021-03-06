@if($filters->count() > 0)
    <form id="filters"></form>
    <div class="wrapper-md b-b">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group pull-right" role="group">
                    <a      href="{{url()->current()}}"
                            class="btn btn-default"><i class="icon-refresh"></i>
                    </a>
                    <button type="submit"
                            id="button-filter"
                            form="filters"
                            class="btn btn-default"><i class="fa fa-filter"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($filters->chunk($chunk) as $value)
                <div class="col-sm-3">
                    @foreach($value as $filter)

                        @php
                            if(is_string($filter)){
                                $filter = new $filter;
                            }

                            $filter= $filter->display();
                        @endphp

                        @if(is_a($filter,\Orchid\Platform\Fields\FieldContract::class))
                            {!! $filter->form('filters')->render() !!}
                        @else
                            {!! $filter !!}
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endif
