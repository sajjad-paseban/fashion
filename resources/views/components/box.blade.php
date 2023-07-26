<div class="custom-card show-content">
    <div class="custom-card-header">
        <div class="buttons">
            <div class="default-buttons">
                <button class="remove">
                    <span class="material-symbols-outlined">
                        remove
                    </span>
                </button>
                <button class="add">
                    <span class="material-symbols-outlined">
                        add
                    </span>
                </button>
            </div>
            <div class="custom-buttons">
                @foreach ($buttons as $item)
                    <a href="{{$item['href']}}" class="btn btn-sm btn-primary">
                        {{$item['name']}}
                    </a>
                @endforeach
            </div>
        </div>
        <h6>
            {{$title}}
        </h6>
    </div>
    <div class="custom-card-body">
        {{$slot}}
    </div>
</div>