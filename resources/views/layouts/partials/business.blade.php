{{-- resources/views/partials/business_list.blade.php --}}
@foreach ($business as $item)
    <li>
        <div class="list-box-listing">
            <div class="list-box-listing-img">
                <a href="{{route('business.single', $item->slug)}}">
                    <img src="{{asset('business/feature/' . $item->featureImage)}}" alt="">
                </a>
            </div>
            <div class="list-box-listing-content">
                <div class="inner">
                    <h3><a href="{{route('business.single', $item->slug)}}">{{$item->name}}</a></h3>
                    <span>{{$item->address}}</span>
                </div>
            </div>
        </div>
        <div class="buttons-to-right">
            <a href="{{route('business.edit', $item->id)}}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this item')" href="{{route('business.delete', $item->id)}}" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
        </div>
    </li>
@endforeach

@if ($business->hasPages())
    <div class="pagination">
        {{ $business->links() }}
    </div>
@endif
