import axios from 'axios';

class Search {
  // 1. describe and create / initiate our object
  constructor() {
    this.resultsDiv = document.getElementById('search-content');
    this.search = document.querySelector('.custom_search');
    this.icon = document.querySelector('.icon');
    this.clear = document.querySelector('.clear');
    this.search_button = document.querySelector('.search-btn');
    this.search_input = document.getElementById('my_search');

    this.activeStatus;
    this.events();
    this.onChangeValue();
    this.searchState();
    this.isSpinnerVisible = false;
    this.typingTimer;
  }

  // 2. events
  events() {
    this.icon.addEventListener('click', this.iconClick.bind(this));
    this.search_input.addEventListener('input', this.onInput.bind(this));
    this.clear.addEventListener('click', this.onClear.bind(this));
  }

  // 3. methods
  iconClick() {
    let activeState = this.search.classList.toggle('active');
    console.log(activeState);
    if (activeState) {
      sessionStorage.setItem('activeState', 'active');
    } else {
      sessionStorage.clear();
    }
  }

  searchState() {
    this.activeStatus = sessionStorage.getItem('activeState');
    if (this.activeStatus === 'active') {
      this.search.classList.toggle('active');
    }
  }

  onChangeValue() {
    if (this.search_input.value.length > 0 || this.search_input.value) {
      this.clear.classList.add('shown');
      // this.search_button.classList.add('shown');
      this.typingLogic();
    } else {
      this.clear.classList.remove('shown');
      // this.search_button.classList.remove('shown');
      this.isSpinnerVisible = true;
      this.typingLogic();
    }
  }

  typingLogic() {
    clearTimeout(this.typingTimer);
    if (!this.isSpinnerVisible) {
      this.resultsDiv.innerHTML = `<div class="catalogs-spinner"></div>`;
      this.isSpinnerVisible = true;
    }
    this.typingTimer = setTimeout(this.getResults.bind(this), 750);
  }

  async getResults() {
    if (this.search_input.value.length > 0 || this.search_input.value) {
      try {
        const res = await axios.get(
          catalogsData.root_url +
            `/wp-json/wp/v2/store?search=${this.search_input.value}`
        );
        const results = res.data;
        console.log(results);
        this.resultsDiv.innerHTML = results.length
          ? `
          <h3 class="text-xl font-semibold">Brands | Retailers</h3>
           <ul class="search-results-list">
           ${results
             .map(
               (el) =>
                 `<li class="search-results-item"><a href="${el.link}">${el.title.rendered}</a></li>`
             )
             .join('')}
               
          </ul>`
          : `<p>No matching results</p>`;
      } catch (error) {
        console.log(error);
      }
    } else {
      console.log('HTML hidden');
      this.resultsDiv.innerHTML = '';
    }
    this.isSpinnerVisible = false;
  }

  onInput() {
    console.log(this.search_input.value);
    this.onChangeValue();
  }

  onClear() {
    this.search_input.value = '';
    this.onChangeValue();
  }
}

export default Search;
