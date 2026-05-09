function hcDNAMRNADonustur() {
    let dna = document.getElementById('hc-dna-seq').value.toUpperCase().trim();
    
    // Geçersiz karakter temizliği
    dna = dna.replace(/[^ATCG]/g, '');
    
    if (dna.length === 0) {
        alert('Lütfen geçerli bir DNA dizisi giriniz.');
        return;
    }

    const mrna = dna.replace(/T/g, 'U');

    document.getElementById('hc-mrna-val').innerText = mrna;
    document.getElementById('hc-dna-mrna-result').classList.add('visible');
}
