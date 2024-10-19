// CSS
import "../css/clarkson.css";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css"; 
import 'tippy.js/dist/tippy.css';
import "../css/choices.scss"
import "../css/filepond.scss"

// JS
import "./bootstrap";
import "preline";

// Library
import { createApp, defineAsyncComponent } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
import VueTippy from 'vue-tippy';
import VueLazyLoad from 'vue3-lazyload';

// Components
import { Icon } from '@iconify/vue';

import { createReusableTemplate } from '@vueuse/core';
const [DefineTemplate, ReuseTemplate] = createReusableTemplate();

import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { ResizableHandle, ResizablePanel, ResizablePanelGroup } from '@/components/ui/resizable';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { DropdownMenu, DropdownMenuContent, DropdownMenuGroup, DropdownMenuItem, DropdownMenuLabel, DropdownMenuPortal, DropdownMenuSeparator, DropdownMenuShortcut, DropdownMenuSub, DropdownMenuSubContent, DropdownMenuSubTrigger, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Input } from '@/components/ui/input';
import { Badge } from '@/components/ui/badge';
import { Command, CommandDialog, CommandEmpty, CommandGroup, CommandInput, CommandItem, CommandList, CommandSeparator, CommandShortcut } from '@/components/ui/command';
import { Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle, DialogTrigger } from '@/components/ui/dialog';
import { ScrollArea } from '@/components/ui/scroll-area';
import { Menubar, MenubarCheckboxItem, MenubarContent, MenubarItem, MenubarMenu, MenubarRadioGroup, MenubarRadioItem, MenubarSeparator, MenubarShortcut, MenubarSub, MenubarSubContent, MenubarSubTrigger, MenubarTrigger, MenubarLabel } from '@/components/ui/menubar';
import { ContextMenu, ContextMenuCheckboxItem, ContextMenuContent, ContextMenuItem, ContextMenuLabel, ContextMenuRadioGroup, ContextMenuRadioItem, ContextMenuSeparator, ContextMenuShortcut, ContextMenuSub, ContextMenuSubContent, ContextMenuSubTrigger, ContextMenuTrigger } from '@/components/ui/context-menu';
import { Drawer, DrawerClose, DrawerContent, DrawerDescription, DrawerFooter, DrawerHeader, DrawerTitle, DrawerTrigger } from '@/components/ui/drawer';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import { Breadcrumb, BreadcrumbEllipsis, BreadcrumbItem, BreadcrumbLink, BreadcrumbList, BreadcrumbPage, BreadcrumbSeparator } from '@/components/ui/breadcrumb';
import { Sheet, SheetClose, SheetContent, SheetDescription, SheetFooter, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/components/ui/accordion';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel';
// ...

const el = document.getElementById("app");
const app = createApp({render: renderSpladeApp({ el })})

app.config.globalProperties.$sidebar = true;

app.use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": {
            delay: 100,
            color: "#000000",
            css: true,
            spinner: true,
        }, 
        "view_transitions": true
    })
    .use(VueTippy, {
        directive: 'tippy',
        component: 'tippy',
        componentSingleton: 'tippy-singleton',
        defaultProps: {
            placement: 'top',
            allowHTML: true,
        },
    })
    .use(VueLazyLoad)
    .component('Icon', Icon)
    .component('Clock', defineAsyncComponent(() => import("./components/Clock.vue"))) 
    .component('Mode', defineAsyncComponent(() => import("./components/Mode.vue"))) 
    .component('Key', defineAsyncComponent(() => import("./components/Key.vue")))
    .component('TinyMCE', defineAsyncComponent(() => import("./components/TinyMCE.vue")))
    .component('Calendar', defineAsyncComponent(() => import("./components/cms/Calendar.vue"))) 
    .component('MenuManagement', defineAsyncComponent(() => import("./components/cms/MenuManagement.vue"))) 
    .component('MenuNested', defineAsyncComponent(() => import("./components/cms/MenuNested.vue"))) 
    .component('MenuRaw', defineAsyncComponent(() => import("./components/cms/MenuRaw.vue"))) 
    .component('CmsTable', defineAsyncComponent(() => import("./components/cms/Table.vue"))) 
    .component('DefineTemplate', DefineTemplate)
    .component('ReuseTemplate', ReuseTemplate)
    .component('Button', Button) 
    .component('ResizableHandle', ResizableHandle) 
    .component('ResizablePanel', ResizablePanel) 
    .component('ResizablePanelGroup', ResizablePanelGroup) 
    .component('Tooltip', Tooltip) 
    .component('TooltipContent', TooltipContent) 
    .component('TooltipProvider', TooltipProvider) 
    .component('TooltipTrigger', TooltipTrigger) 
    .component('Select', Select) 
    .component('SelectContent', SelectContent) 
    .component('SelectItem', SelectItem) 
    .component('SelectTrigger', SelectTrigger) 
    .component('SelectValue', SelectValue) 
    .component('Separator', Separator) 
    .component('Avatar', Avatar) 
    .component('AvatarFallback', AvatarFallback) 
    .component('AvatarImage', AvatarImage) 
    .component('DropdownMenu', DropdownMenu)
    .component('DropdownMenuContent', DropdownMenuContent)
    .component('DropdownMenuGroup', DropdownMenuGroup)
    .component('DropdownMenuItem', DropdownMenuItem)
    .component('DropdownMenuLabel', DropdownMenuLabel)
    .component('DropdownMenuPortal', DropdownMenuPortal)
    .component('DropdownMenuSeparator', DropdownMenuSeparator)
    .component('DropdownMenuShortcut', DropdownMenuShortcut)
    .component('DropdownMenuSub', DropdownMenuSub)
    .component('DropdownMenuSubContent', DropdownMenuSubContent)
    .component('DropdownMenuSubTrigger', DropdownMenuSubTrigger)
    .component('DropdownMenuTrigger', DropdownMenuTrigger)
    .component('Input', Input)
    .component('Badge', Badge)
    .component('Command', Command)
    .component('CommandDialog', CommandDialog)
    .component('CommandEmpty', CommandEmpty)
    .component('CommandGroup', CommandGroup)
    .component('CommandInput', CommandInput)
    .component('CommandItem', CommandItem)
    .component('CommandList', CommandList)
    .component('CommandSeparator', CommandSeparator)
    .component('CommandShortcut', CommandShortcut)
    .component('Dialog', Dialog)
    .component('DialogContent', DialogContent)
    .component('DialogDescription', DialogDescription)
    .component('DialogFooter', DialogFooter)
    .component('DialogHeader', DialogHeader)
    .component('DialogTitle', DialogTitle)
    .component('DialogTrigger', DialogTrigger)
    .component('ScrollArea', ScrollArea)
    .component('Menubar', Menubar)
    .component('MenubarCheckboxItem', MenubarCheckboxItem)
    .component('MenubarContent', MenubarContent)
    .component('MenubarItem', MenubarItem)
    .component('MenubarMenu', MenubarMenu)
    .component('MenubarRadioGroup', MenubarRadioGroup)
    .component('MenubarRadioItem', MenubarRadioItem)
    .component('MenubarSeparator', MenubarSeparator)
    .component('MenubarShortcut', MenubarShortcut)
    .component('MenubarSub', MenubarSub)
    .component('MenubarSubContent', MenubarSubContent)
    .component('MenubarSubTrigger', MenubarSubTrigger)
    .component('MenubarTrigger', MenubarTrigger)
    .component('ContextMenu', ContextMenu)
    .component('ContextMenuCheckboxItem', ContextMenuCheckboxItem)
    .component('ContextMenuContent', ContextMenuContent)
    .component('ContextMenuItem', ContextMenuItem)
    .component('ContextMenuLabel', ContextMenuLabel)
    .component('ContextMenuRadioGroup', ContextMenuRadioGroup)
    .component('ContextMenuRadioItem', ContextMenuRadioItem)
    .component('ContextMenuSeparator', ContextMenuSeparator)
    .component('ContextMenuShortcut', ContextMenuShortcut)
    .component('ContextMenuSub', ContextMenuSub)
    .component('ContextMenuSubContent', ContextMenuSubContent)
    .component('ContextMenuSubTrigger', ContextMenuSubTrigger)
    .component('ContextMenuTrigger', ContextMenuTrigger)
    .component('Drawer', Drawer)
    .component('DrawerClose', DrawerClose)
    .component('DrawerContent', DrawerContent)
    .component('DrawerDescription', DrawerDescription)
    .component('DrawerFooter', DrawerFooter)
    .component('DrawerHeader', DrawerHeader)
    .component('DrawerTitle', DrawerTitle)
    .component('DrawerTrigger', DrawerTrigger)
    .component('Tabs', Tabs)
    .component('TabsContent', TabsContent)
    .component('TabsList', TabsList)
    .component('TabsTrigger', TabsTrigger)
    .component('Breadcrumb', Breadcrumb)
    .component('BreadcrumbEllipsis', BreadcrumbEllipsis)
    .component('BreadcrumbItem', BreadcrumbItem)
    .component('BreadcrumbLink', BreadcrumbLink)
    .component('BreadcrumbList', BreadcrumbList)
    .component('BreadcrumbPage', BreadcrumbPage)
    .component('BreadcrumbSeparator', BreadcrumbSeparator)
    .component('Sheet', Sheet)
    .component('SheetContent', SheetContent)
    .component('SheetDescription', SheetDescription)
    .component('SheetHeader', SheetHeader)
    .component('SheetTitle', SheetTitle)
    .component('SheetClose', SheetClose)
    .component('SheetFooter', SheetFooter)
    .component('SheetTrigger', SheetTrigger)
    .component('Accordion', Accordion)
    .component('AccordionContent', AccordionContent)
    .component('AccordionItem', AccordionItem)
    .component('AccordionTrigger', AccordionTrigger)
    .component('Table', Table)
    .component('TableBody', TableBody)
    .component('TableCaption', TableCaption)
    .component('TableCell', TableCell)
    .component('TableHead', TableHead)
    .component('TableHeader', TableHeader)
    .component('TableRow', TableRow)
    .component('Card', Card)
    .component('CardContent', CardContent)
    .component('CardDescription', CardDescription)
    .component('CardFooter', CardFooter)
    .component('CardHeader', CardHeader)
    .component('CardTitle', CardTitle)
    .component('Alert', Alert)
    .component('AlertDescription', AlertDescription)
    .component('AlertTitle', AlertTitle)
    .component('Popover', Popover)
    .component('PopoverContent', PopoverContent)
    .component('PopoverTrigger', PopoverTrigger)
    .component('Carousel', Carousel)
    .component('CarouselContent', CarouselContent)
    .component('CarouselItem', CarouselItem)
    .component('CarouselNext', CarouselNext)
    .component('CarouselPrevious', CarouselPrevious)

app.mount(el);