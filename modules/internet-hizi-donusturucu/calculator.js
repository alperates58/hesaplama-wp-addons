function hcInternetHiziHesapla() {
    const hiz = parseFloat(document.getElementById('hc-ihd-hiz').value);
    const birim = document.getElementById('hc-ihd-birim').value;
    const dosyaGB = parseFloat(document.getElementById('hc-ihd-dosya').value);
    const resultDiv = document.getElementById('hc-internet-hizi-donusturucu-result');
    const output = document.getElementById('hc-ihd-output');

    if (isNaN(hiz)) {
        alert('Lütfen geçerli bir hız giriniz.');
        return;
    }

    let mbps;
    if (birim === 'mbps') mbps = hiz;
    else if (birim === 'kbps') mbps = hiz / 1000;
    else if (birim === 'mbs') mbps = hiz * 8;

    const mbs = mbps / 8;
    const kbs = mbs * 1024;

    let html = `
        <div style="margin-bottom:15px;">
            <div class="hc-result-label">Hız Dönüşümleri:</div>
            <div class="hc-result-value">${mbps.toLocaleString('tr-TR')} Mbps</div>
            <div style="font-size:18px; color:#667085;">= ${mbs.toLocaleString('tr-TR', {maximumFractionDigits: 2})} MB/s</div>
            <div style="font-size:14px; color:#667085;">= ${kbs.toLocaleString('tr-TR', {maximumFractionDigits: 0})} KB/s</div>
        </div>
    `;

    if (!isNaN(dosyaGB) && dosyaGB > 0) {
        const dosyaMB = dosyaGB * 1024;
        const saniye = dosyaMB / mbs;
        
        const saat = Math.floor(saniye / 3600);
        const dakika = Math.floor((saniye % 3600) / 60);
        const sn = Math.floor(saniye % 60);

        let sureText = '';
        if (saat > 0) sureText += `${saat} saat `;
        if (dakika > 0) sureText += `${dakika} dakika `;
        sureText += `${sn} saniye`;

        html += `
            <div style="padding-top:15px; border-top:1px solid #e6edf5;">
                <div class="hc-result-label">${dosyaGB} GB dosya için tahmini süre:</div>
                <div class="hc-result-value" style="color:var(--hc-front-green);">${sureText}</div>
            </div>
        `;
    }

    output.innerHTML = html;
    resultDiv.classList.add('visible');
}
