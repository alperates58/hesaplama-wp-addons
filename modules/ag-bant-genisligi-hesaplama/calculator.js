function hcAgBantGenisligiHesapla() {
    const boyut = parseFloat(document.getElementById('hc-bw-boyut').value);
    const birim = document.getElementById('hc-bw-boyut-birim').value;
    const sure = parseFloat(document.getElementById('hc-bw-sure').value);

    if (!boyut || !sure) {
        alert('Lütfen boyut ve süre bilgilerini giriniz.');
        return;
    }

    // Byte cinsinden hesapla
    let boyutByte = boyut;
    if (birim === 'MB') boyutByte = boyut * 1024 * 1024;
    if (birim === 'GB') boyutByte = boyut * 1024 * 1024 * 1024;
    if (birim === 'TB') boyutByte = boyut * 1024 * 1024 * 1024 * 1024;

    // Bit cinsinden: 1 Byte = 8 Bit
    const boyutBit = boyutByte * 8;

    // Bant genişliği (bps) = Toplam Bit / Saniye
    const bps = boyutBit / sure;
    const mbps = bps / (1000 * 1000); // Megabit per second

    const sonucDiv = document.getElementById('hc-ag-bw-result');
    document.getElementById('hc-bw-res-val').innerText = mbps.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' Mbps';
    
    const noteDiv = document.getElementById('hc-bw-res-note');
    noteDiv.innerText = `${boyut} ${birim} veriyi ${sure} saniyede aktarmak için gereken ortalama hızdır. Kayıp ve gecikmeler (overhead) dahil edilmemiştir.`;

    sonucDiv.classList.add('visible');
}
