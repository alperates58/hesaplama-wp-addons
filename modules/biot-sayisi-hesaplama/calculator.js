function hcBiotHesapla() {
    const h = parseFloat(document.getElementById('hc-bi-h').value);
    const Lc = parseFloat(document.getElementById('hc-bi-lc').value);
    const k = parseFloat(document.getElementById('hc-bi-k').value);

    if (isNaN(h) || isNaN(Lc) || isNaN(k) || k <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Bi = (h * Lc) / k
    const Bi = (h * Lc) / k;
    let desc = "";

    if (Bi < 0.1) {
        desc = "Bi < 0.1: Sıcaklık dağılımı üniform kabul edilebilir (Yığılmış Kapasite Analizi uygundur).";
    } else {
        desc = "Bi > 0.1: Cismin içindeki sıcaklık gradyanları ihmal edilemez.";
    }

    document.getElementById('hc-bi-res-val').innerText = Bi.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-bi-res-desc').innerText = desc;
    
    document.getElementById('hc-bi-result').classList.add('visible');
}
