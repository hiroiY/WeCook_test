@extends('layouts.app')
@vite(['resources\sass\comment_qestion.scss'])
@vite(['resources\js\tabs.js'])
@section('content')
<!-- tab menu area-->
<div class="comment_qa">
    <div class="col w-100">
      <div 
        class="tab me-auto mt-5" 
        style="max-width: 97%;"
      >
        <ul class="tab_menu m-0 p-0">
          <li 
            class="tab_menu-item w-100" 
            data-tab="01"
          >
            <i class="fa-regular fa-comments"></i>
            Comments&nbsp;
            <span>(11)</span>
          </li>
          <li 
            class="tab_menu-item w-100 is-active" 
            data-tab="02"
          >
            <i class="fa-solid fa-file-circle-question"></i>
            Q&A&nbsp;
            <span>(11)</span>
          </li>
        </ul>

          <!-- tab_panel area/ text here! -->
        <div class="tab_panel">
          <!-- Comment area -->
          @include('comment_qestion.comment')
          <!-- Question area -->
          @include('comment_qestion.qestion')
        </div>
      </div>
    </div>
  </div>
  @endsection