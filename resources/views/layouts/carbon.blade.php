<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="icon" href="<%= BASE_URL %>favicon.ico" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
  </head>
  <body>
    <noscript>
      <strong
        >We're sorry but carbon-tutorial-vue doesn't work properly without JavaScript enabled. Please enable it to
        continue.</strong
      >
    </noscript>
    <div id="app"></div>
    <!-- built files will be auto injected -->
        
    <header class="bx--header" role="banner" aria-label="IBM Platform Name" data-header>
      <a class="bx--skip-to-content" href="#main-content" tabindex="0">Skip to main content</a>
      <button class="bx--header__menu-trigger bx--header__action" aria-label="Open menu" title="Open menu"
        data-navigation-menu-panel-label-expand="Open menu" data-navigation-menu-panel-label-collapse="Close menu"
        data-navigation-menu-target="#navigation-menu-82drm5kl2z3">
        <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-collapse-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M24 9.4L22.6 8 16 14.6 9.4 8 8 9.4 14.6 16 8 22.6 9.4 24 16 17.4 22.6 24 24 22.6 17.4 16 24 9.4z"></path></svg>
        <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-expand-icon" width="20" height="20" viewBox="0 0 20 20"><path d="M2 14.8H18V16H2zM2 11.2H18V12.399999999999999H2zM2 7.6H18V8.799999999999999H2zM2 4H18V5.2H2z"></path></svg>
      </button>
      <a class="bx--header__name" href="javascript:void(0)" title="">
        <span class="bx--header__name--prefix">
          IBM
          &nbsp;
        </span>
        [Platform]
      </a>
      <!--
        Copyright IBM Corp. 2016, 2018
      
        This source code is licensed under the Apache-2.0 license found in the
        LICENSE file in the root directory of this source tree.
      -->
      
      <!--
        We're designating the header navigation as a menubar. As a result, we
        have each link designated as a menuitem. Links have a tabindex of "0" since
        Safari does not provide links focus by default.
      
        For sub-menus, we are following the guidance specified here:
        https://www.w3.org/TR/wai-aria-practices/examples/menubar/menubar-1/menubar-1.html#rps_label
      
        Most noticeably, the first menuitem in a submenu should receive a tabindex of
        "0", while the rest should get "-1"
      -->
      <nav class="bx--header__nav" aria-label="Platform Name" data-header-nav>
        <ul class="bx--header__menu-bar" aria-label="Platform Name">
          <li>
            <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="0">
              L1 link 1
            </a>
          </li>
          <li>
            <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="0">
              L1 link 2
            </a>
          </li>
          <li class="bx--header__submenu" data-header-submenu>
            <a class="bx--header__menu-item bx--header__menu-title" aria-haspopup="true"
              aria-expanded="true" href="javascript:void(0)" tabindex="0">
              L1 link 3
              <svg class="bx--header__menu-arrow" width="12" height="7" aria-hidden="true">
                <path d="M6.002 5.55L11.27 0l.726.685L6.003 7 0 .685.726 0z" />
              </svg>
            </a>
            <ul class="bx--header__menu" aria-label="L1 link 3">
              <li role="none">
                <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="-1">
                  <span class="bx--text-truncate--end">
                    Link 1
                  </span>
                </a>
              </li>
              <li role="none">
                <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="-1">
                  <span class="bx--text-truncate--end">
                    Link 2
                  </span>
                </a>
              </li>
              <li role="none">
                <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="-1">
                  <span class="bx--text-truncate--end">
                    Ipsum architecto voluptatem
                  </span>
                </a>
              </li>
            </ul>
          </li>
          <li class="bx--header__submenu" data-header-submenu>
            <a class="bx--header__menu-item bx--header__menu-title" aria-haspopup="true"
              aria-expanded="false" href="javascript:void(0)" tabindex="0">
              L1 link 4
              <svg class="bx--header__menu-arrow" width="12" height="7" aria-hidden="true">
                <path d="M6.002 5.55L11.27 0l.726.685L6.003 7 0 .685.726 0z" />
              </svg>
            </a>
            <ul class="bx--header__menu" aria-label="L1 link 4">
              <li role="none">
                <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="-1">
                  <span class="bx--text-truncate--end">
                    Link 1
                  </span>
                </a>
              </li>
              <li role="none">
                <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="-1">
                  <span class="bx--text-truncate--end">
                    Link 2
                  </span>
                </a>
              </li>
              <li role="none">
                <a class="bx--header__menu-item" href="javascript:void(0)" tabindex="-1">
                  <span class="bx--text-truncate--end">
                    Ipsum architecto voluptatem
                  </span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <div class="bx--header__global">
        <button class="bx--header__menu-trigger bx--header__action" aria-label="Action 1"
          title="Action 1" data-navigation-menu-panel-label-expand="Action 1"
          data-navigation-menu-panel-label-collapse="Close menu" data-product-switcher-target="#switcher-bqavcareoq">
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-expand-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M8.24 25.14L7 26.67a13.79 13.79 0 004.18 2.44l.69-1.87A12 12 0 018.24 25.14zM4.19 18l-2 .41A14.09 14.09 0 003.86 23L5.59 22A12.44 12.44 0 014.19 18zM11.82 4.76l-.69-1.87A13.79 13.79 0 007 5.33L8.24 6.86A12 12 0 0111.82 4.76zM5.59 10L3.86 9a14.37 14.37 0 00-1.64 4.59l2 .34A12.05 12.05 0 015.59 10zM16 2V4a12 12 0 010 24v2A14 14 0 0016 2z"></path></svg>
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-collapse-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M24 9.4L22.6 8 16 14.6 9.4 8 8 9.4 14.6 16 8 22.6 9.4 24 16 17.4 22.6 24 24 22.6 17.4 16 24 9.4z"></path></svg>
        </button>
        <button class="bx--header__menu-trigger bx--header__action" aria-label="Action 2"
          title="Action 2" data-navigation-menu-panel-label-expand="Action 2"
          data-navigation-menu-panel-label-collapse="Close menu" data-product-switcher-target="#switcher-bqavcareoq">
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-expand-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M8.24 25.14L7 26.67a13.79 13.79 0 004.18 2.44l.69-1.87A12 12 0 018.24 25.14zM4.19 18l-2 .41A14.09 14.09 0 003.86 23L5.59 22A12.44 12.44 0 014.19 18zM11.82 4.76l-.69-1.87A13.79 13.79 0 007 5.33L8.24 6.86A12 12 0 0111.82 4.76zM5.59 10L3.86 9a14.37 14.37 0 00-1.64 4.59l2 .34A12.05 12.05 0 015.59 10zM16 2V4a12 12 0 010 24v2A14 14 0 0016 2z"></path></svg>
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-collapse-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M24 9.4L22.6 8 16 14.6 9.4 8 8 9.4 14.6 16 8 22.6 9.4 24 16 17.4 22.6 24 24 22.6 17.4 16 24 9.4z"></path></svg>
        </button>
        <button class="bx--header__menu-trigger bx--header__action" aria-label="Action 3"
          title="Action 3" data-navigation-menu-panel-label-expand="Action 3"
          data-navigation-menu-panel-label-collapse="Close menu" data-product-switcher-target="#switcher-bqavcareoq">
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-expand-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M8.24 25.14L7 26.67a13.79 13.79 0 004.18 2.44l.69-1.87A12 12 0 018.24 25.14zM4.19 18l-2 .41A14.09 14.09 0 003.86 23L5.59 22A12.44 12.44 0 014.19 18zM11.82 4.76l-.69-1.87A13.79 13.79 0 007 5.33L8.24 6.86A12 12 0 0111.82 4.76zM5.59 10L3.86 9a14.37 14.37 0 00-1.64 4.59l2 .34A12.05 12.05 0 015.59 10zM16 2V4a12 12 0 010 24v2A14 14 0 0016 2z"></path></svg>
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-collapse-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M24 9.4L22.6 8 16 14.6 9.4 8 8 9.4 14.6 16 8 22.6 9.4 24 16 17.4 22.6 24 24 22.6 17.4 16 24 9.4z"></path></svg>
        </button>
        <button class="bx--header__menu-trigger bx--header__action" aria-label="Action 4"
          title="Action 4" data-navigation-menu-panel-label-expand="Action 4"
          data-navigation-menu-panel-label-collapse="Close menu" data-product-switcher-target="#switcher-bqavcareoq">
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-expand-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M8.24 25.14L7 26.67a13.79 13.79 0 004.18 2.44l.69-1.87A12 12 0 018.24 25.14zM4.19 18l-2 .41A14.09 14.09 0 003.86 23L5.59 22A12.44 12.44 0 014.19 18zM11.82 4.76l-.69-1.87A13.79 13.79 0 007 5.33L8.24 6.86A12 12 0 0111.82 4.76zM5.59 10L3.86 9a14.37 14.37 0 00-1.64 4.59l2 .34A12.05 12.05 0 015.59 10zM16 2V4a12 12 0 010 24v2A14 14 0 0016 2z"></path></svg>
          <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--navigation-menu-panel-collapse-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M24 9.4L22.6 8 16 14.6 9.4 8 8 9.4 14.6 16 8 22.6 9.4 24 16 17.4 22.6 24 24 22.6 17.4 16 24 9.4z"></path></svg>
        </button>
      </div>
    </header>
    <!--
      Copyright IBM Corp. 2016, 2018
    
      This source code is licensed under the Apache-2.0 license found in the
      LICENSE file in the root directory of this source tree.
    -->
    
    <aside class="bx--side-nav" data-side-nav>
      <nav class="bx--side-nav__navigation" role="navigation" aria-label="Side navigation">
        <!-- 
          Copyright IBM Corp. 2016, 2018
        
          This source code is licensed under the Apache-2.0 license found in the
          LICENSE file in the root directory of this source tree.
        -->
        
        <header class="bx--side-nav__header">
          <div class="bx--side-nav__icon">
            <svg
              width="20"
              height="20"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 32 32"
              aria-hidden="true">
              <path d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
            </svg>
          </div>
          <div class="bx--side-nav__details">
            <h2
              class="bx--side-nav__title"
              title="[L1 name here]">
              [L1 name here]
            </h2>
            <div class="bx--side-nav__switcher">
              <label for="side-nav-switcher" class="bx--assistive-text">
                Switcher
              </label>
              <select id="carbon-side-nav-switcher" class="bx--side-nav__select">
                <option
                  class="bx--side-nav__option"
                  disabled=""
                  hidden=""
                  value=""
                  selected=""
                >
                  Switcher
                </option>
                <option class="bx--side-nav__option" value="Option 1">
                  Option 1
                </option>
                <option class="bx--side-nav__option" value="Option 2">
                  Option 2
                </option>
                <option class="bx--side-nav__option" value="Option 3">
                  Option 3
                </option>
              </select>
              <div class="bx--side-nav__switcher-chevron">
                <svg
                  aria-hidden="true"
                  width="20"
                  height="20"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 32 32"
                >
                  <path d="M16 22L6 12l1.414-1.414L16 19.172l8.586-8.586L26 12 16 22z" />
                </svg>
              </div>
            </div>
          </div>
        </header>
        <ul class="bx--side-nav__items">
          <li class="bx--side-nav__item">
            <a class="bx--side-nav__link" href="javascript:void(0)">
              <div class="bx--side-nav__icon bx--side-nav__icon--small">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--side-nav__link-text">Link</span>
            </a>
          </li>
          <li class="bx--side-nav__item bx--side-nav__item--active">
            <a class="bx--side-nav__link" href="javascript:void(0)" aria-current="page">
              <div class="bx--side-nav__icon bx--side-nav__icon--small">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--side-nav__link-text">Link - active</span>
            </a>
          </li>
          <li class="bx--side-nav__item">
            <a class="bx--side-nav__link" href="javascript:void(0)">
              <div class="bx--side-nav__icon bx--side-nav__icon--small">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--side-nav__link-text">
                Link with really long text that should wrap
              </span>
            </a>
          </li>
          <li class="bx--side-nav__item bx--side-nav__item--active">
            <a class="bx--side-nav__link bx--side-nav__link--current" href="javascript:void(0)"
              aria-current="page">
              <div class="bx--side-nav__icon bx--side-nav__icon--small">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--side-nav__link-text">
                Link with really long text that should wrap - active
              </span>
            </a>
          </li>
          <li class="bx--side-nav__item bx--side-nav__item--active">
            <button class="bx--side-nav__submenu" type="button" aria-haspopup="true" aria-expanded="true">
              <div class="bx--side-nav__icon">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path
                    d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--side-nav__submenu-title">
                Category title that is really long and probably should overflow
              </span>
              <div
                class="bx--side-nav__icon bx--side-nav__icon--small bx--side-nav__submenu-chevron">
                <svg aria-hidden="true" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <path d="M16 22L6 12l1.414-1.414L16 19.172l8.586-8.586L26 12 16 22z" />
                </svg>
              </div>
            </button>
            <ul class="bx--side-nav__menu">
              <li class="bx--side-nav__menu-item" role="none">
                <a class="bx--side-nav__link" href="javascript:void(0)">
                  <span class="bx--side-nav__link-text">
                    Link with really long text that probably should be truncated
                  </span>
                </a>
              </li>
              <li class="bx--side-nav__menu-item" role="none">
                <a class="bx--side-nav__link" href="javascript:void(0)" aria-current="page">
                  <span class="bx--side-nav__link-text">
                    Link with really long text that probably should be truncated
                  </span>
                </a>
              </li>
              <li class="bx--side-nav__menu-item" role="none">
                <a class="bx--side-nav__link" href="javascript:void(0)">
                  <span class="bx--side-nav__link-text">Link</span>
                </a>
              </li>
              <li class="bx--side-nav__menu-item" role="none">
                <a class="bx--side-nav__link" href="javascript:void(0)" aria-current="page">
                  <span class="bx--side-nav__link-text">Link</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- 
          Copyright IBM Corp. 2016, 2018
        
          This source code is licensed under the Apache-2.0 license found in the
          LICENSE file in the root directory of this source tree.
        -->
        
        <footer class="bx--side-nav__footer">
          <button class="bx--side-nav__toggle" role="button" title="Close the side navigation menu">
            <div class="bx--side-nav__icon">
              <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--side-nav__icon--collapse bx--side-nav-collapse-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M24 9.4L22.6 8 16 14.6 9.4 8 8 9.4 14.6 16 8 22.6 9.4 24 16 17.4 22.6 24 24 22.6 17.4 16 24 9.4z"></path></svg>
              <svg focusable="false" preserveAspectRatio="xMidYMid meet" style="will-change: transform;" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="bx--side-nav__icon--expand bx--side-nav-expand-icon" width="20" height="20" viewBox="0 0 32 32"><path d="M22 16L12 26 10.6 24.6 19.2 16 10.6 7.4 12 6z"></path></svg>
            </div>
            <span class="bx--assistive-text">
              Toggle the expansion state of the navigation
            </span>
          </button>
        </footer>
      </nav>
    </aside>
    <!--
      Copyright IBM Corp. 2016, 2018
    
      This source code is licensed under the Apache-2.0 license found in the
      LICENSE file in the root directory of this source tree.
    -->
    
    <aside class="bx--panel--overlay" id="switcher-bqavcareoq" data-product-switcher>
      <div class="bx--product-switcher">
        <div class="bx--product-switcher__search">
          <div class="bx--form-item">
            <div data-search class="bx--search bx--search--sm bx--search--shell"
              role="search">
              <label id="search-input-label-1" class="bx--label" for="search__input-1">Search</label>
              <input class="bx--search-input" type="text" role="search" id="search__input-1" placeholder="Search all products"
                aria-labelledby="search-input-label-2">
              <svg class="bx--search-magnifier" width="16" height="16" viewBox="0 0 16 16">
                <path d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm4.936-1.27l4.563 4.557-.707.708-4.563-4.558a6.5 6.5 0 1 1 .707-.707z"
                  fill-rule="nonzero" />
              </svg>
              <button class="bx--search-close bx--search-close--hidden" title="Clear search input"
                aria-label="Clear search input">
                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 6.586L5.879 4.464 4.464 5.88 6.586 8l-2.122 2.121 1.415 1.415L8 9.414l2.121 2.122 1.415-1.415L9.414 8l2.122-2.121-1.415-1.415L8 6.586zM8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"
                    fill-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <p class="bx--product-switcher__subheader">My Products</p>
        <ul class="bx--product-switcher__product-list">
          <li class="bx--product-list__item">
            <a class="bx--product-link" tabindex="0" href="javascript:void(0)">
              <div class="bx--product-switcher__icon">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--product-link__name">My Product</span>
            </a>
            <div data-overflow-menu tabindex="0" aria-label="Overflow menu description" class="bx--overflow-menu">
              <svg width="3" height="15" viewBox="0 0 3 15">
                <path d="M0 1.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 1 1-3 0M0 7.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 1 1-3 0M0 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 1 1-3 0"></path>
              </svg>
              <ul class="bx--overflow-menu-options bx--overflow-menu--flip" tabindex="-1"
                data-floating-menu-direction="bottom">
                <li class="bx--overflow-menu-options__option bx--overflow__item">
                  <button class="bx--overflow-menu-options__btn" title="Option 1"
                    data-floating-menu-primary-focus>Option 1</button>
                </li>
                <li class="bx--overflow-menu-options__option">
                  <button class="bx--overflow-menu-options__btn">Option 2</button>
                </li>
              </ul>
            </div>
          </li>
          <li class="bx--product-list__item">
            <a class="bx--product-link" tabindex="0" href="javascript:void(0)">
              <div class="bx--product-switcher__icon">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true">
                  <path d="M8.24 25.14L7 26.67a14 14 0 0 0 4.18 2.44l.68-1.88a12 12 0 0 1-3.62-2.09zm-4.05-7.07l-2 .35A13.89 13.89 0 0 0 3.86 23l1.73-1a11.9 11.9 0 0 1-1.4-3.93zm7.63-13.31l-.68-1.88A14 14 0 0 0 7 5.33l1.24 1.53a12 12 0 0 1 3.58-2.1zM5.59 10L3.86 9a13.89 13.89 0 0 0-1.64 4.54l2 .35A11.9 11.9 0 0 1 5.59 10zM16 2v2a12 12 0 0 1 0 24v2a14 14 0 0 0 0-28z" />
                </svg>
              </div>
              <span class="bx--product-link__name">My Product 2</span>
            </a>
            <div data-overflow-menu tabindex="0" aria-label="Overflow menu description" class="bx--overflow-menu">
              <svg width="3" height="15" viewBox="0 0 3 15">
                <path d="M0 1.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 1 1-3 0M0 7.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 1 1-3 0M0 13.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 1 1-3 0"></path>
              </svg>
              <ul class="bx--overflow-menu-options bx--overflow-menu--flip" tabindex="-1"
                data-floating-menu-direction="bottom">
                <li class="bx--overflow-menu-options__option bx--overflow__item">
                  <button class="bx--overflow-menu-options__btn" title="Option 1"
                    data-floating-menu-primary-focus>Option 1</button>
                </li>
                <li class="bx--overflow-menu-options__option">
                  <button class="bx--overflow-menu-options__btn">Option 2</button>
                </li>
              </ul>
            </div>
          </li>
        </ul>
    
        <div class="bx--product-switcher__item">
          <button aria-label="Show All Applications" tabindex="0" class="bx--product-switcher__all-btn">
            View all products
          </button>
        </div>
      </div>
    </aside>
    <!--
      Copyright IBM Corp. 2016, 2018
    
      This source code is licensed under the Apache-2.0 license found in the
      LICENSE file in the root directory of this source tree.
    -->
    
    <div class="bx--navigation" id="navigation-menu-82drm5kl2z3"
       data-navigation-menu>
       <div class="bx--navigation-section">
        <ul class="bx--navigation-items">
          <li class="bx--navigation-item">
            <a class="bx--navigation-link" href="javascript:void(0)">
              Item link
            </a>
          </li>
          <li class="bx--navigation-item">
            <a class="bx--navigation-link" href="javascript:void(0)">
              Item link
            </a>
          </li>
        </ul>
      </div>
     <div class="bx--navigation-section">
        <ul class="bx--navigation-items">
          <li class="bx--navigation-item bx--navigation-item--active">
            <a class="bx--navigation-link" href="javascript:void(0)">
              Item link
            </a>
          </li>
          <li class="bx--navigation-item">
            <a class="bx--navigation-link" href="javascript:void(0)">
              Item link
            </a>
          </li>
          <li class="bx--navigation-item">
            <a class="bx--navigation-link" href="javascript:void(0)">
              Item link
            </a>
          </li>
          <li class="bx--navigation-item">
            <div class="bx--navigation__category bx--navigation__category--expanded">
                <button class="bx--navigation__category-toggle" aria-haspopup="true" aria-expanded="false"
                  aria-controls="category-1-menu">
                  <div class="bx--navigation__category-title">
                    L1 category
                    <svg aria-hidden="true" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                      <path d="M16 22L6 12l1.414-1.414L16 19.172l8.586-8.586L26 12 16 22z" />
                    </svg>
                  </div>
                </button>
                <ul id="category-1-menu" class="bx--navigation__category-items">
                  <li class="bx--navigation__category-item">
                    <a class="bx--navigation-link" href="javascript:void(0)">
                      Nested link
                    </a>
                  </li>
                  <li
                    class="bx--navigation__category-item bx--navigation__category-item--active">
                    <a class="bx--navigation-link" href="javascript:void(0)">
                      Nested link
                    </a>
                  </li>
                  <li class="bx--navigation__category-item">
                    <a class="bx--navigation-link" href="javascript:void(0)">
                      Nested link
                    </a>
                  </li>
                </ul>
              </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="bx--content">
      <h1>Heading</h1>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
      <h2>Sub-section</h2>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <p>
        Elit odit veritatis repudiandae laboriosam amet. Dolore doloribus ut obcaecati harum ad Expedita hic atque quas
        repellat et sed Tempore similique laudantium autem quam commodi, temporibus. Minus voluptates reiciendis adipisci.
      </p>
      <h3>Tertiary section</h3>
      <p>
        Adipisicing eius ea est ducimus nihil Sit modi quisquam tempore asperiores at Culpa omnis quasi a rem sapiente,
        illo Omnis aut maiores magnam perspiciatis at, rerum? Esse ullam veritatis debitis.
      </p>
    </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>