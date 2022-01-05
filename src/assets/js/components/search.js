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
    // this.clear.addEventListener('click', this.onClear.bind(this));
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
    this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
  }

  async getResults() {
    if (this.search_input.value.length > 0 || this.search_input.value) {
      try {
        const results = await axios.get(
          'http://witbankcatalogs20.local/wp-json/wp/v2/store?search=shoprite'
        );
        console.log(results.data);
      } catch (error) {
        console.log(error);
      }

      this.resultsDiv.innerHTML = /*html*/ `
        <h3 class="text-xl font-semibold">Title</h3>
         <ul class="search-results-list">
             <li class="search-results-item">Results Will Be Here</li>
        </ul>`;
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
