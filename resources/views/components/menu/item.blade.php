@foreach($menu as $item)
    @if($item['type'] == 'separator')
        <MenubarSeparator />
    @endif
    @if($item['type'] == 'menu')
        @if(isset($item['submenu']) && is_array($item['submenu']) && count($item['submenu']) > 0)
            <MenubarSub>
                <MenubarSubTrigger>{{ $item['title'] }}</MenubarSubTrigger>
                <MenubarSubContent>
                    @foreach($item['submenu'] as $submenuItem)
                        <MenubarItem @click="() => { $splade.visit('{{ route($submenuItem['route']) }}') }">
                            {{ $submenuItem['title'] }}
                        </MenubarItem>
                    @endforeach
                </MenubarSubContent>
            </MenubarSub>
        @else
            <MenubarItem @click="() => { $splade.visit('{{ route($item['route']) }}') }">
                {{ $item['title'] }}
            </MenubarItem>
        @endif
    @endif
@endforeach