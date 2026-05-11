function hcAtikSuDebisiHesapla() {
    const nufus = parseFloat(document.getElementById('hc-as-nufus').value);
    const tuketim = parseFloat(document.getElementById('hc-as-tuketim').value);
    const donus = parseFloat(document.getElementById('hc-as-donus').value) / 100;
    const sizma = parseFloat(document.getElementById('hc-as-sizma').value) || 0;
    const sanayi = parseFloat(document.getElementById('hc-as-sanayi').value) || 0;

    if (isNaN(nufus) || isNaN(tuketim) || isNaN(donus)) {
        alert('Lütfen gerekli tüm alanları geçerli sayılarla doldurun.');
        return;
    }

    // Evsel debi (L/sn) = (Nüfus * Tüketim * Dönüş Oranı) / (24 * 3600)
    const evselDebi = (nufus * tuketim * donus) / 86400;
    const toplamDebi = evselDebi + sizma + sanayi;
    const gunlukHacim = toplamDebi * 86.4; // L/sn to m³/gün conversion (86400 / 1000)

    document.getElementById('hc-as-evsel').innerText = evselDebi.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' L/sn';
    document.getElementById('hc-as-toplam').innerText = toplamDebi.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' L/sn';
    document.getElementById('hc-as-hacim').innerText = gunlukHacim.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³/gün';

    document.getElementById('hc-as-result').classList.add('visible');
}
