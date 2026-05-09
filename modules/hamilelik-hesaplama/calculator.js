function hcPregHesapla() {
    const lmpVal = document.getElementById('hc-preg-lmp').value;
    if (!lmpVal) {
        alert('Lütfen son adet tarihinizi seçiniz.');
        return;
    }

    const lmpDate = new Date(lmpVal);
    const today = new Date();
    
    // Tahmini Doğum Tarihi (EDD): LMP + 280 gün
    const eddDate = new Date(lmpDate.getTime() + (280 * 24 * 60 * 60 * 1000));
    
    // Geçen süre (ms)
    const diffMs = today.getTime() - lmpDate.getTime();
    if (diffMs < 0) {
        alert('Son adet tarihi gelecek bir tarih olamaz.');
        return;
    }

    const totalDays = Math.floor(diffMs / (24 * 60 * 60 * 1000));
    const weeks = Math.floor(totalDays / 7);
    const days = totalDays % 7;

    const remainMs = eddDate.getTime() - today.getTime();
    const remainDays = Math.ceil(remainMs / (24 * 60 * 60 * 1000));

    // Results
    document.getElementById('hc-res-preg-due').innerText = eddDate.toLocaleDateString('tr-TR', {
        day: 'numeric', month: 'long', year: 'numeric'
    });
    
    document.getElementById('hc-res-preg-week').innerText = `${weeks} Hafta ${days} Gün`;
    document.getElementById('hc-res-preg-remain').innerText = Math.max(0, remainDays).toLocaleString('tr-TR');

    let tri = '';
    if (weeks < 13) tri = '1. Trimester (Erken Dönem)';
    else if (weeks < 27) tri = '2. Trimester (Gelişim Dönemi)';
    else tri = '3. Trimester (Hazırlık Dönemi)';

    document.getElementById('hc-res-preg-tri').innerText = tri;
    document.getElementById('hc-preg-result').classList.add('visible');
}
