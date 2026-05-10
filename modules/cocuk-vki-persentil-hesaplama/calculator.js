function hcChildVkiPercHesapla() {
    const age = parseInt(document.getElementById('hc-cvp-age').value);
    const vki = parseFloat(document.getElementById('hc-cvp-vki').value);

    if (!age || !vki) return;

    const resStatus = document.getElementById('hc-cvp-res-status');
    const resDesc = document.getElementById('hc-cvp-res-desc');

    // Simplified clinical percentile logic for children
    if (vki < 14) {
        resStatus.innerText = 'Düşük Kilolu';
        resStatus.style.color = '#3498db';
        resDesc.innerText = '5. persentilin altında. Gelişim takibi önerilir.';
    } else if (vki < 19) {
        resStatus.innerText = 'Sağlıklı Kilo';
        resStatus.style.color = '#27ae60';
        resDesc.innerText = '5. ile 85. persentil arası. Yaşıtlarıyla uyumlu gelişim.';
    } else if (vki < 22) {
        resStatus.innerText = 'Kilolu Olma Riski';
        resStatus.style.color = '#f1c40f';
        resDesc.innerText = '85. ile 95. persentil arası. Beslenme kontrolü önerilir.';
    } else {
        resStatus.innerText = 'Obezite';
        resStatus.style.color = '#e74c3c';
        resDesc.innerText = '95. persentilin üzerinde. Pediatri uzmanına danışılmalıdır.';
    }

    document.getElementById('hc-child-vki-perc-result').classList.add('visible');
}
