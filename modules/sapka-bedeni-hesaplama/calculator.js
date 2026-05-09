function hcHatSizeHesapla() {
    const circ = parseFloat(document.getElementById('hc-hat-circ').value);

    if (isNaN(circ) || circ < 40) {
        alert('Lütfen geçerli bir baş çevresi giriniz.');
        return;
    }

    let size = "S";
    let us = "7";
    let uk = "6 7/8";

    if (circ >= 62) { size = "XXL"; us = "7 3/4"; uk = "7 5/8"; }
    else if (circ >= 60) { size = "XL"; us = "7 1/2"; uk = "7 3/8"; }
    else if (circ >= 58) { size = "L"; us = "7 1/4"; uk = "7 1/8"; }
    else if (circ >= 56) { size = "M"; us = "7"; uk = "6 7/8"; }
    else if (circ >= 54) { size = "S"; us = "6 3/4"; uk = "6 5/8"; }
    else { size = "XS"; us = "6 1/2"; uk = "6 3/8"; }

    document.getElementById('hc-res-hat-val').innerText = size;
    document.getElementById('hc-res-hat-us').innerText = us;
    document.getElementById('hc-res-hat-uk').innerText = uk;
    
    document.getElementById('hc-hat-size-result').classList.add('visible');
}
