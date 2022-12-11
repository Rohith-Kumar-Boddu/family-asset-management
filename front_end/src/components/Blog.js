import Navbar from './Navbar';

function Blog() {
  console.log(process.env.REACT_APP_BLOG)
  return (
    <div className="">
      <Navbar currentpage='blog'  />
      <div className='wrapper'>
        <h4>Welcome to the blogs of Family Site</h4>
        <div className='wrapper-content'>
            <div className='wrapper-left'>
                <span className='fa fa-user fa-6x'></span>
            </div>
            <div className='wrapper-right'>
                <h3>Blog by Author</h3>
                <p>This site is has helped alot in managing family resources</p>
                <p>From Family Members to what they Own</p>

                <p style={{color:"red"}}>
                    Please Check Our Blog Here <br/><br/>
                    <a className='btn-action' target="_blank" rel="noreferrer" href={process.env.REACT_APP_BLOG}>View Blog</a>
                </p>
            </div>
        </div>
      </div>
      
    </div>
  );
}

export default Blog;
