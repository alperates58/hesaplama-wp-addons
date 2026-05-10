function hcPetAgeHesapla() {
    const type = document.getElementById('hc-pa-type').value;
    const age = parseFloat(document.getElementById('hc-pa-age').value);

    if (!age) {
        alert('Lütfen hayvanın yaşını giriniz.');
        return;
    }

    let humanAge = 0;

    if (type === 'cat') {
        if (age === 1) humanAge = 15;
        else if (age === 2) humanAge = 24;
        else humanAge = 24 + (age - 2) * 4;
    } else {
        // Dogs: first 2 years roughly 24 years, then depends on size
        if (age === 1) humanAge = 15;
        else if (age === 2) humanAge = 24;
        else {
            let mult = 4;
            if (type === 'dog-medium') mult = 5;
            if (type === 'dog-large') mult = 7;
            humanAge = 24 + (age - 2) * mult;
        }
    }

    const resVal = document.getElementById('hc-pa-res-val');
    resVal.innerText = Math.round(humanAge);

    document.getElementById('hc-pet-age-result').classList.add('visible');
}
