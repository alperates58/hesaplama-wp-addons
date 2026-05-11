function hcFosCalcHesapla() {
    const yieldStress = parseFloat(document.getElementById('hc-fs-sigma-y').value);
    const workingStress = parseFloat(document.getElementById('hc-fs-sigma-w').value);

    if (isNaN(yieldStress) || isNaN(workingStress) || workingStress <= 0 || yieldStress <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // FOS = Sy / Sw
    const fos = yieldStress / workingStress;

    document.getElementById('hc-fs-res-val').innerText = fos.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    let desc = "";
    if (fos < 1) desc = "⚠️ GÜVENSİZ! (Malzeme hasar görür)";
    else if (fos < 1.5) desc = "Düşük Emniyet (Hassas tasarımlar için)";
    else if (fos < 3) desc = "Güvenli (Genel mühendislik)";
    else desc = "Yüksek Emniyet";

    document.getElementById('hc-fs-res-desc').innerText = desc;
    document.getElementById('hc-fs-result').classList.add('visible');
}
