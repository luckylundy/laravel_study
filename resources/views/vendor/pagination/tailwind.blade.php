{{-- ページが2ページ以上あるか確認 --}}
@if ($paginator->hasPages())
    <nav>
        <div>
            <span>
                {{-- 今1ページ目にいるか確認 --}}
                @if ($paginator->onFirstPage())
                    {{-- 1ページ目だったらこれ以上前に戻れないのでリンクなし --}}
                    <span>←</span>
                @else
                    {{-- 1ページ目でないなら戻るリンクを生成 --}}
                    <a href="{{ $paginator->previousPageUrl() }}">←</a>
                @endif
                {{-- Laravelが自動で用意してくれるページ番号の配列 --}}
                @foreach ($elements as $element)
                    {{-- Array of Links --}}
                    @if (is_array($element))
                        {{-- 配列をページ番号とそのページのURLに分ける --}}
                        @foreach ($element as $page => $url)
                            {{-- 今いるページのリンクはなし --}}
                            @if ($page == $paginator->currentPage())
                                <span>{{ $page }}</span>
                            @else
                                {{-- 他のページへはリンクを生成する --}}
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- 今いるページに次のページがあればリンクを生成する --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">→</a>
                @else
                    {{-- 次のページがなければリンクなし --}}
                    <span>→</span>
                @endif
            </span>
        </div>
    </nav>
@endif
