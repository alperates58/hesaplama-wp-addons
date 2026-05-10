function hcElbiseBedeniHesapla() {
    const bust = parseFloat(document.getElementById('hc-dr-bust').value);
    const waist = parseFloat(document.getElementById('hc-dr-waist').value);
    const hip = parseFloat(document.getElementById('hc-dr-hip').value);

    if (!bust || !waist || !hip) return;

    let size = 36;
    let letter = "S";

    if (bust <= 82 && waist <= 64) { size = 34; letter = "XS"; }
    else if (bust <= 86 && waist <= 68) { size = 36; letter = "S"; }
    else if (bust <= 90 && waist <= 72) { size = 38; letter = "M"; }
    else if (bust <= 94 && waist <= 76) { size = 40; letter = "L"; }
    else if (bust <= 99 && waist <= 82) { size = 42; letter = "XL"; }
    else if (bust <= 105 && waist <= 88) { size = 44; letter = "XXL"; }
    else { size = "46+"; letter = "3XL+"; }

    document.getElementById('hc-dr-val').innerText = size;
    document.getElementById('hc-dr-letter').innerText = "Uluslararası: " + letter;
    document.getElementById('hc-dr-result').classList.add('visible');
}
