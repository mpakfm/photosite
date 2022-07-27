<?php
/**
 * Created by PhpStorm
 * Project: photo
 * User:    mpak
 * Date:    24.07.2022
 * Time:    21:35
 */
?>
<x-umbrella-layout>
    <x-slot name="header">
        <div class="nk-layout">
            <div class="nk-slider nk-slider-hide-titles" data-active-category="хаски" data-transition-speed="500" data-transition-effect="fade" data-category-transition-speed="500" data-category-transition-effect="top" data-autoplay="false" data-force-reload="fade">
                @foreach ($photoList as $item)
                    <div class="nk-slider-item active" data-categories="{{ $item->tag }}" data-background-position="50% 40%">
                        <img src="assets/images/placeholder.svg" data-src="{{ Storage::url($item->path) }}" alt="" class="lazyload">
                    </div>
                @endforeach
            </div>

            <!-- Top Center -->
            <div class="nk-layout-top-center">
                <nav class="nk-nav">
                    <ul class="nk-slider-categories">
                    </ul>
                </nav>
            </div>

            <!-- Bottom Right -->
            <div class="nk-layout-bottom-right">
                <div class="nk-slider-nav nk-slider-nav-slim">
                    <ul>
                    </ul>
                    <div>
                        <div class="nk-slider-nav-prev">
                            <span class="nk-icon-arrow-up"></span>
                        </div>
                        <div class="nk-slider-nav-next">
                            <span class="nk-icon-arrow-down"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Left -->
            <div class="nk-layout-top-left">
                <a href="./" class="nk-nav-logo">
                    <img src="assets/images/new-logo.png" alt="" width="240" data-logo-dark="assets/images/new-logo-dark.png">
                </a>
                <div class="nk-loading-spinner-place"></div>
            </div>

            <div class="nk-layout-bottom-left-blog">
                <nav class="nk-nav nk-nav-hide">
                    <ul>
                        <li class="hover"><a href="./">Close</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Titles -->
            <div class="nk-layout-content-tagline"><strong>Листай вниз</strong></div>
            <h3 class="nk-layout-content-title"></h3>
            <h3 class="nk-layout-content-subtitle">Фотоальбом</h3>

        </div>
    </x-slot>

</x-umbrella-layout>
