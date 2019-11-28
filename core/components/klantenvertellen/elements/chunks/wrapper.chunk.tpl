<div class="row">
    <div class="col-12 col-md-4">
        <h3 class="text-center">[[+summary.rating]]</h3>
        <p class="text-center">[[%klantenvertellen.summary_reviews? &namespace=`klantenvertellen`&topic=`default`&total=`[[+summary.reviews]]`]]</p>
        <p class="text-center">[[%klantenvertellen.summary_recommendation? &namespace=`klantenvertellen`&topic=`default`&total=`[[+summary.recommendations]]`&name=`[[+summary.account]]`]]</p>
    </div>
    <div class="col-12 col-md-8">
        [[+output]]
    </div>
</div>