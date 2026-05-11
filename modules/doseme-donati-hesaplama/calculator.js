function hcDosemeDonatiHesapla() {
    const h = parseFloat(document.getElementById('hc-dd-h').value); // cm
    const cc = parseFloat(document.getElementById('hc-dd-cc').value); // cm
    const Md = parseFloat(document.getElementById('hc-dd-md').value); // kNm/m
    const fyd = parseFloat(document.getElementById('hc-dd-fyd').value); // kN/cm2 (36.5 for S420)

    if (isNaN(h) || isNaN(Md)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const d = h - cc - 0.5; // faydalı derinlik (yaklaşık)
    // Basitleştirilmiş iç kuvvet kolu z ~= 0.9 * d
    const z = 0.9 * d;

    // As = Md / (fyd * z)
    // Md kNm/m -> kNcm/m (100 ile çarp)
    const As = (Md * 100) / (fyd * z);

    // Minimum donatı (TS 500: S420 için 0.002 * b * h)
    const As_min = 0.002 * 100 * h;
    const finalAs = Math.max(As, As_min);

    document.getElementById('hc-dd-res-as').innerText = finalAs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm²/m';
    
    // Donatı önerisi
    let suggest = "";
    if (finalAs <= 3.93) suggest = "Φ10/20 (3.93 cm²/m)";
    else if (finalAs <= 5.24) suggest = "Φ10/15 (5.24 cm²/m)";
    else if (finalAs <= 6.28) suggest = "Φ10/12.5 (6.28 cm²/m)";
    else if (finalAs <= 7.85) suggest = "Φ10/10 (7.85 cm²/m)";
    else if (finalAs <= 9.42) suggest = "Φ12/12 (9.42 cm²/m)";
    else suggest = "Φ12/10 (11.31 cm²/m) veya daha büyük";

    document.getElementById('hc-dd-res-suggest').innerText = 'Donatı Önerisi: ' + suggest;
    
    document.getElementById('hc-dd-result').classList.add('visible');
}
