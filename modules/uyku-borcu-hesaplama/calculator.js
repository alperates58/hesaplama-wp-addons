function hcUykuBorcuHesapla() {
    const target = parseFloat(document.getElementById('hc-ub-target').value);
    const actual = parseFloat(document.getElementById('hc-ub-actual').value);

    if (isNaN(target) || isNaN(actual)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    const dailyDebt = target - actual;
    const weeklyDebt = dailyDebt * 7;
    
    const resVal = document.getElementById('hc-ub-res-val');
    const resDesc = document.getElementById('hc-ub-res-desc');

    var statusText = weeklyDebt > 0 ? (weeklyDebt.toFixed(1).toLocaleString('tr-TR') + ' Saat') : (weeklyDebt < 0 ? 'Borç Yok' : 'Dengeli');
    var severity = weeklyDebt > 0 ? 'danger' : (weeklyDebt < 0 ? 'success' : 'success');
    var desc = weeklyDebt > 0 
        ? 'Haftalık uyku borcunuz birikmiş. Bu borcu hafta sonu telafi etmeye çalışmak yerine günlük uykunuzu 30-60 dakika artırmanız önerilir.' 
        : (weeklyDebt < 0 ? 'Hedefinizden daha fazla uyuyorsunuz. Harika!' : 'Uyku düzeniniz hedeflerinizle tam uyumlu.');

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('uyku-borcu-hesaplama', {
        weeklyDebt: weeklyDebt.toFixed(1).toLocaleString('tr-TR'),
        statusText: statusText,
        desc: desc,
        severity: severity,
        metadata: {
            badges: ['Sağlık & Tıp', 'Uyku Hijyeni']
        }
    })) {
        return;
    }

    if (weeklyDebt > 0) {
        resVal.innerText = weeklyDebt.toFixed(1).toLocaleString('tr-TR') + ' Saat';
        resVal.style.color = '#e74c3c';
        resDesc.innerText = 'Haftalık uyku borcunuz birikmiş. Bu borcu hafta sonu telafi etmeye çalışmak yerine günlük uykunuzu 30-60 dakika artırmanız önerilir.';
    } else if (weeklyDebt < 0) {
        resVal.innerText = 'Borç Yok';
        resVal.style.color = '#27ae60';
        resDesc.innerText = 'Hedefinizden daha fazla uyuyorsunuz. Harika!';
    } else {
        resVal.innerText = 'Dengeli';
        resVal.style.color = '#2ecc71';
        resDesc.innerText = 'Uyku düzeniniz hedeflerinizle tam uyumlu.';
    }

    document.getElementById('hc-uyku-borcu-result').classList.add('visible');
}
