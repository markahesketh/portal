<div class="search">
    {{ Form::open(['action' => 'ForumSearchController@getSearch', 'method' => 'GET']) }}
    {{ Form::text('query', isset($query) ? $query : '', ['placeholder' => 'search the laravel.io forum'] )}}
    {{ Form::close() }}
</div>

<ul>
    {{-- $forumSections is set in the constructor of the ForumController class --}}
    @foreach($forumSections as $sectionTitle => $sectionTags)
        <li>
            <a href="{{ action('ForumThreadsController@getIndex') }}{{ $sectionTags ? '?tags=' . $sectionTags : '' }}">{{ $sectionTitle }}
                @if($sectionCounts[$sectionTags] > 0)
                    <span class="new">{{ $sectionCounts[$sectionTags] < 10 ? $sectionCounts[$sectionTags] : '9+' }}</span>
                @endif
            </a>
        </li>
    @endforeach
</ul>