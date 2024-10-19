<ContextMenuItem>
    {{ __('Back') }}
    <ContextMenuShortcut>⌘[</ContextMenuShortcut>
</ContextMenuItem>

<ContextMenuItem disabled>
    {{ __('Forward') }}
    <ContextMenuShortcut>⌘]</ContextMenuShortcut>
</ContextMenuItem>

<ContextMenuItem @click.prevent="() => $splade.refresh()">
    {{ __('Reload') }}
    <ContextMenuShortcut>⌘R</ContextMenuShortcut>
</ContextMenuItem>

<ContextMenuSeparator />

<ContextMenuItem @click.prevent="() => { this.$sidebar = !this.$sidebar }">
    <span v-if="!this.$sidebar" class="me-1">{{ __('Show') }}</span>
    <span v-if="this.$sidebar" class="me-1">{{ __('Hide') }}</span>
    {{ __('Sidebar') }}
    <ContextMenuShortcut>⇧⌘S</ContextMenuShortcut>
</ContextMenuItem>