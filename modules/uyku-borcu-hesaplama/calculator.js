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
        primaryResult: statusText,
        shortSummary: 'Uyku borcu analizi başarıyla tamamlandı.',
        interpretation: desc,
        formula: {
            raw: 'Uyku Borcu = (Hedef Uyku - Gerçek Uyku) * 7',
            text: 'Hedeflenen günlük uyku süresi ile gerçekleşen günlük uyku süresi arasındaki farkın haftalık toplamıdır.'
        },
        source: {
            name: 'Dünya Sağlık Örgütü (WHO) Uyku Kılavuzları',
            url: 'https://www.who.int'
        },
        nextActions: [
            'Hafta sonu aşırı uyumak yerine günlük uykunuzu 30-60 dakika artırın.',
            'Yatmadan en az 1 saat önce ekran kullanımını sonlandırın.'
        ],
        faq: [
            { question: "Uyku borcu kronik yorgunluğa yol açar mı?", answer: "Evet, biriken uyku borcu dikkat dağınıklığı ve yorgunluğa neden olabilir." },
            { question: "Yetişkinler için günlük ideal uyku süresi nedir?", answer: "WHO ve uzmanlar yetişkinler için günlük 7-9 saat uykuyu önermektedir." }
        ],
        metadata: {
            severity: severity,
            status: 'success',
            lastUpdated: '2026-07-06',
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
