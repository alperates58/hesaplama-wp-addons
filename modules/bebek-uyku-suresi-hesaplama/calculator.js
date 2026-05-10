function hcBabySleepHesapla() {
    const age = document.getElementById('hc-bs-age').value;
    const resTotal = document.getElementById('hc-bs-res-total');
    const resNote = document.getElementById('hc-bs-res-note');

    const data = {
        '0-3': { range: '14-17 Saat', note: 'Bu dönemde uyku döngüleri çok düzensizdir ve beslenme aralıkları uykuyu sık böler.' },
        '4-11': { range: '12-16 Saat', note: 'Gündüz uykuları daha düzenli hale gelmeye başlar. Genellikle 2-3 gündüz uykusu görülür.' },
        '12-24': { range: '11-14 Saat', note: 'Gündüz uykusu genellikle 1-2 seferdir. Gece uykusu daha kesintisiz hale gelir.' },
        '36-60': { range: '10-13 Saat', note: 'Gündüz uykusu azalabilir veya tamamen kalkabilir.' }
    };

    const selected = data[age];
    resTotal.innerText = selected.range;
    resNote.innerText = selected.note;

    document.getElementById('hc-baby-sleep-result').classList.add('visible');
}
