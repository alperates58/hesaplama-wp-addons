function hcKAKBHesapla() {
    const type = document.getElementById('hc-kk-type').value;
    const inputVal = parseFloat(document.getElementById('hc-kk-val').value);

    if (isNaN(inputVal) || inputVal <= 0) {
        alert('Lütfen geçerli bir pozitif değer giriniz.');
        return;
    }

    const Kw = 1e-14;
    let ka, pka, kb, pkb;

    if (type === 'ka') {
        ka = inputVal;
        pka = -Math.log10(ka);
        pkb = 14 - pka;
        kb = Math.pow(10, -pkb);
    } else if (type === 'pka') {
        pka = inputVal;
        ka = Math.pow(10, -pka);
        pkb = 14 - pka;
        kb = Math.pow(10, -pkb);
    } else if (type === 'kb') {
        kb = inputVal;
        pkb = -Math.log10(kb);
        pka = 14 - pkb;
        ka = Math.pow(10, -pka);
    } else if (type === 'pkb') {
        pkb = inputVal;
        kb = Math.pow(10, -pkb);
        pka = 14 - pkb;
        ka = Math.pow(10, -pka);
    }

    document.getElementById('hc-kk-res-ka').innerText = ka.toExponential(4);
    document.getElementById('hc-kk-res-pka').innerText = pka.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-kk-res-kb').innerText = kb.toExponential(4);
    document.getElementById('hc-kk-res-pkb').innerText = pkb.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-kk-result').classList.add('visible');
}
