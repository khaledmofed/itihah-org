{{-- Hero / Page Banner - shared across all inner pages --}}
{{-- Variables: $heroTitle (required), $heroDesc (optional), $heroBreadcrumb (required) --}}
<div class="elementor-element elementor-element-e7ed44a e-con-full e-flex e-con e-parent e-lazyloaded" data-id="e7ed44a" data-element_type="container">
    <div class="elementor-element elementor-element-7002764 e-con-full e-flex e-con e-child" data-id="7002764" data-element_type="container">
        <div class="elementor-element elementor-element-2277a09 e-con-full e-flex e-con e-child" data-id="2277a09" data-element_type="container">
            {{-- Title + Description --}}
            <div class="elementor-element elementor-element-2e52210 e-con-full e-flex e-con e-child" data-id="2e52210" data-element_type="container">
                <div class="elementor-element elementor-element-d0fff18 elementor-widget elementor-widget-heading" data-id="d0fff18" data-element_type="widget" data-widget_type="heading.default">
                    <h1 class="elementor-heading-title elementor-size-default">{{ $heroTitle }}</h1>
                </div>
                @if(!empty($heroDesc))
                <div class="elementor-element elementor-element-4ab1c7e elementor-widget elementor-widget-text-editor" data-id="4ab1c7e" data-element_type="widget" data-widget_type="text-editor.default">
                    <p>{{ $heroDesc }}</p>
                </div>
                @endif
            </div>
            {{-- Breadcrumb --}}
            <div class="elementor-element elementor-element-f78560f e-con-full e-flex e-con e-child" data-id="f78560f" data-element_type="container">
                <div class="elementor-element elementor-element-20ad731 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="20ad731" data-element_type="widget" data-widget_type="icon-list.default">
                    <ul class="elementor-icon-list-items">
                        <li class="elementor-icon-list-item">
                            <a href="{{ route('home') }}">
                                <span class="elementor-icon-list-text">الرئيسية</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="elementor-element elementor-element-446b914 elementor-view-default elementor-widget elementor-widget-icon" data-id="446b914" data-element_type="widget" data-widget_type="icon.default">
                    <div class="elementor-icon-wrapper">
                        <div class="elementor-icon">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-chevron-circle-right" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9df9bd0 elementor-widget elementor-widget-heading" data-id="9df9bd0" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-heading-title elementor-size-default">{{ $heroBreadcrumb }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
