function hcSVIHesapla() {
    const ssv = parseFloat(document.getElementById('hc-svi-ssv').value);
    const mlss = parseFloat(document.getElementById('hc-svi-mlss').value);

    if (isNaN(ssv) || isNaN(mlss) || ssv < 0 || mlss <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const svi = (ssv * 1000) / mlss;

    document.getElementById('hc-svi-val').innerText = svi.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' mL/g';
    
    let comment = "";
    if (svi < 80) comment = "İyi çökelme özelliği.";
    else if (svi <= 150) comment = "Normal çökelme aralığı.";
    else comment = "Çamur şişmesi (Bulking) riski, zayıf çökelme.";

    document.getElementById('hc-svi-note').innerText = comment;
    document.getElementById('hc-svi-result').classList.add('visible');
}
