function hcHicriHesapla() {
    const dateVal = document.getElementById('hc-ht-date').value;
    if (!dateVal) { alert('Lütfen bir tarih seçin.'); return; }

    const date = new Date(dateVal);
    
    // Using Intl API for Hijri conversion
    const hijriDate = new Intl.DateTimeFormat('tr-u-ca-islamic-uma-nu-latn', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }).format(date);

    document.getElementById('hc-ht-val').innerText = hijriDate;
    document.getElementById('hc-ht-result').classList.add('visible');
}
