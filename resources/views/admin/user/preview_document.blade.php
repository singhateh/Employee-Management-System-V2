
<style>
  .color{
      background-color:silver
  }
  </style>
  <div class="accordian-body collapse " id="demo{{$key}}">
    <p><iframe src="{{ asset('uploads/documents/' .$document->document_unique_name) }}" width="100%" height="390" frameborder="0"></iframe></p>
  </div>
  {{-- </div> --}}
</div>