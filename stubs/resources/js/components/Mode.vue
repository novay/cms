<script setup lang="ts">
import { useColorMode } from '@vueuse/core'
import { Icon } from '@iconify/vue'
import { Button } from '@/components/ui/button'
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'

const mode = useColorMode()
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button variant="ghost" class="py-1 px-2">
                <Icon icon="radix-icons:sun" class="h-4 w-4 rotate-0 scale-100 transition-all dark:text-white dark:-rotate-90 dark:scale-0" />
                <Icon icon="radix-icons:moon" class="absolute h-4 w-4 rotate-90 scale-0 transition-all dark:text-white dark:rotate-0 dark:scale-100" />
                <span class="sr-only">Toggle theme</span>
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end" class="w-32 dark:border-gray-900">
            <DropdownMenuItem @click="mode = 'light'" class="flex items-center gap-2">
                <Icon icon="radix-icons:sun" class="w-4 h-4" />
                Light
            </DropdownMenuItem>
            <DropdownMenuItem @click="mode = 'dark'" class="flex items-center gap-2">
                <Icon icon="radix-icons:moon" class="w-4 h-4" />
                Dark
            </DropdownMenuItem>
            <DropdownMenuItem @click="mode = 'auto'" class="flex items-center gap-2">
                <Icon icon="radix-icons:desktop" class="w-4 h-4" />
                System
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>