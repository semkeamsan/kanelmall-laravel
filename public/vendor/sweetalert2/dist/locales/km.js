Swal.prototype.lang = function($lang){
    $languagas = {
         ok : 'យល់ព្រម',
        cancel : 'បោះបង់',
    }

    if($languagas[$lang]){
       return $languagas[$lang];
    }
    return $lang;

};
