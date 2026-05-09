function hcUrineAnalyze(level) {
    const items = document.querySelectorAll('.hc-urine-item');
    items.forEach((item, index) => {
        if (index === level - 1) item.classList.add('selected');
        else item.classList.remove('selected');
    });

    const status = document.getElementById('hc-ur-status');
    const desc = document.getElementById('hc-ur-desc');

    if (level === 1) {
        status.innerText = 'ÇOK İYİ (HİDRASYON FAZLA)';
        status.style.backgroundColor = '#e3f2fd';
        status.style.color = '#1976d2';
        desc.innerText = 'Vücudunuz tamamen hidre durumda. Su içmeye bir süre ara verebilirsiniz.';
    } else if (level <= 3) {
        status.innerText = 'İDEAL (HİDRASYON NORMAL)';
        status.style.backgroundColor = '#e8f5e9';
        status.style.color = '#2e7d32';
        desc.innerText = 'Vücudunuzdaki su seviyesi sağlıklı aralıkta. Mevcut düzeninizi koruyun.';
    } else if (level <= 5) {
        status.innerText = 'HAFİF DEHİDRASYON';
        status.style.backgroundColor = '#fff3e0';
        status.style.color = '#ef6c00';
        desc.innerText = 'Vücudunuz su kaybetmeye başlamış. Şimdi bir bardak su içmeniz önerilir.';
    } else if (level <= 7) {
        status.innerText = 'ORTA DERECE DEHİDRASYON';
        status.style.backgroundColor = '#ffebee';
        status.style.color = '#c62828';
        desc.innerText = 'Vücudunuzun acilen suya ihtiyacı var. Susuzluk hissini beklemeden su için.';
    } else {
        status.innerText = 'CİDDİ DEHİDRASYON / RİSK';
        status.style.backgroundColor = '#fce4ec';
        status.style.color = '#880e4f';
        desc.innerText = 'Vücudunuz kritik düzeyde susuz kalmış olabilir. Bolca su için ve eşlik eden belirtiler (baş dönmesi, halsizlik) varsa dikkatli olun.';
    }

    document.getElementById('hc-urine-result').classList.add('visible');
}
