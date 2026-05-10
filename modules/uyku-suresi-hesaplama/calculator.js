function hcUykuSuresiHesapla() {
    const bedStr = document.getElementById('hc-us-bed').value;
    const wakeStr = document.getElementById('hc-us-wake').value;

    if (!bedStr || !wakeStr) {
        alert('Lütfen yatış ve uyanma saatlerini seçiniz.');
        return;
    }

    const bed = new Date('2026-01-01T' + bedStr);
    let wake = new Date('2026-01-01T' + wakeStr);

    if (wake <= bed) {
        wake = new Date('2026-01-02T' + wakeStr);
    }

    const diffMs = wake - bed;
    const diffHrs = diffMs / (1000 * 60 * 60);
    const hours = Math.floor(diffHrs);
    const minutes = Math.round((diffHrs - hours) * 60);

    const resVal = document.getElementById('hc-us-res-val');
    const resDesc = document.getElementById('hc-us-res-desc');

    resVal.innerText = hours + ' Saat ' + minutes + ' Dakika';

    if (diffHrs < 7) {
        resDesc.innerText = 'Yetersiz uyku. Yetişkinler için 7-9 saat önerilir.';
        resDesc.style.color = '#e67e22';
    } else if (diffHrs <= 9) {
        resDesc.innerText = 'İdeal uyku süresi.';
        resDesc.style.color = '#27ae60';
    } else {
        resDesc.innerText = 'Fazla uyku. Uzun süreli uyku bazı sağlık sorunlarının habercisi olabilir.';
        resDesc.style.color = '#2980b9';
    }

    document.getElementById('hc-uyku-suresi-result').classList.add('visible');
}
