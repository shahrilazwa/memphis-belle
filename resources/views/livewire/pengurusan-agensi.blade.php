<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Action Menu -->
    <div class="flex flex-wrap items-center col-span-12 mt-2 intro-y sm:flex-nowrap">
        <div class="flex w-full sm:w-auto">
            <div class="relative w-48 text-slate-500">
                <input type="text" class="w-48 pr-10 form-control box" placeholder="Carian kementerian..."
                    wire:model='search'>
                <i class="absolute inset-y-0 right-0 w-4 h-4 my-auto mr-3" data-lucide="search"></i>
            </div>
            <select class="ml-2 form-select box">
                <option>Status</option>
                <option>Waiting Payment</option>
                <option>Confirmed</option>
                <option>Packing</option>
                <option>Delivered</option>
                <option>Completed</option>
            </select>
        </div>
        <div class="hidden mx-auto xl:block text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="flex items-center w-full mt-3 xl:w-auto xl:mt-0">
            <button class="mr-2 shadow-md btn btn-primary">
                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
            </button>
            <button class="mr-2 shadow-md btn btn-primary">
                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
            </button>
            <div class="dropdown">
                <button class="px-2 dropdown-toggle btn box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="flex items-center justify-center w-5 h-5">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="w-40 dropdown-menu">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="arrow-left-right" class="w-4 h-4 mr-2"></i> Change Status
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="bookmark" class="w-4 h-4 mr-2"></i> Bookmark
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
    <!-- BEGIN: Data List -->
    <div class="col-span-12 overflow-auto intro-y 2xl:overflow-visible">
        <table class="table -mt-2 table-report">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">
                        <input class="form-check-input" type="checkbox">
                    </th>
                    <th class="cursor-pointer whitespace-nowrap" wire:click="sort('nama')">INVOICE</th>
                    <th class="whitespace-nowrap">BUYER NAME</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-right whitespace-nowrap">
                        <div class="pr-16">TOTAL TRANSACTION</div>
                    </th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agensi as $item)
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">{{ $item->nama }}</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">132</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">California, LA</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Completed
                        </div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$123,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex items-center justify-center">
                            <a class="flex items-center mr-5 text-primary whitespace-nowrap" href="javascript:;">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <i data-lucide="arrow-left-right" class="w-4 h-4 mr-1"></i> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div>