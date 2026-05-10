function hcKopekYasiHesapla() {
    const age = parseInt(document.getElementById('hc-ky-dog-age').value);
    const size = document.getElementById('hc-ky-dog-size').value;

    if (!age || age <= 0) {
        alert('Lütfen geçerli bir yaş giriniz.');
        return;
    }

    let humanAge = 0;
    
    // Modern "yaş x 7" kuralı yerine daha hassas AVMA verileri
    if (age === 1) {
        humanAge = 15;
    } else if (age === 2) {
        humanAge = 24;
    } else {
        let multi = 4;
        if (size === 'medium') multi = 5;
        if (size === 'large') multi = 6;
        if (size === 'giant') multi = 7;
        
        humanAge = 24 + (age - 2) * multi;
    }

    const resVal = document.getElementById('hc-ky-res-val');
    resVal.innerText = humanAge;

    document.getElementById('hc-kopek-yasi-result').classList.add('visible');
}
