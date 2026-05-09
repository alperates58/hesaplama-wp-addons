function hcGCIcerigiHesapla() {
    let dna = document.getElementById('hc-gc-seq').value.toUpperCase().trim();
    dna = dna.replace(/[^ATCG]/g, '');

    if (dna.length === 0) {
        alert('Lütfen geçerli bir DNA dizisi giriniz.');
        return;
    }

    const gCount = (dna.match(/G/g) || []).length;
    const cCount = (dna.match(/C/g) || []).length;
    const gcPercent = ((gCount + cCount) / dna.length) * 100;

    document.getElementById('hc-gc-val').innerText = '%' + gcPercent.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-gc-stats').innerHTML = `
        <p>Toplam Uzunluk: ${dna.length} bp</p>
        <p>G: ${gCount}, C: ${cCount}, A: ${(dna.match(/A/g) || []).length}, T: ${(dna.match(/T/g) || []).length}</p>
    `;
    
    document.getElementById('hc-gc-result').classList.add('visible');
}
