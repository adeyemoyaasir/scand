const form = document.querySelector('form');
const productType = document.getElementById('productType');
const bookInfo = document.getElementById('book-info');
const dvdInfo = document.getElementById('dvd-info');
const furnitureInfo = document.getElementById('furniture-info');

form.addEventListener('submit', function(e) {
  e.preventDefault();
  if (!productType.value) {
    alert('Please select a productType');
    return;
  }

  if (productType.value === 'books') {
    if (!weight.value) {
      alert('Please enter weight information');
      return;
    }
  } else if (productType.value === 'dvd') {
    if (!size.value) {
      alert('Please enter director and year information');
      return;
    }
  } else if (productType.value === 'furniture') {
    if (!height.value || !width.value || !length.value) {
      alert('Please enter material and dimensions information');
      return;
    }
  }
 
  form.submit();
});

productType.addEventListener('change', function() {   
  if (productType.value === 'books') {
    bookInfo.style.display = 'block';
    dvdInfo.style.display = 'none';
    furnitureInfo.style.display = 'none';
  } else if (productType.value === 'dvd') {
    dvdInfo.style.display = 'block';
    bookInfo.style.display = 'none';
    furnitureInfo.style.display = 'none';
  } else if (productType.value === 'furniture') {
    furnitureInfo.style.display = 'block';
    bookInfo.style.display = 'none';
    dvdInfo.style.display = 'none';
  } else {
    bookInfo.style.display = 'none';
    dvdInfo.style.display = 'none';
    furnitureInfo.style.display = 'none';
  }
});
