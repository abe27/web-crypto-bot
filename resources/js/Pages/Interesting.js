import React, { useEffect, useState } from 'react'
import { Authenticated } from '@/Layouts'
import {
  Breadcrumbs,
  Header,
  Skeletons,
  HeaderBreadcrumbs,
  RefreshAndBack,
} from '@/Components'
import { InterestingTableView } from '@/Components/Interestings'

const Interesting = (props) => {
  const [linkGet, setLinkGet] = useState(route('interesting.get'))
  const [interestData, setInterestData] = useState(null)
  const [isLoadingRefesh, setLoadingRefresh] = useState(false)

  const getInteresting = async (url) => {
    console.log(`url => ${url}`)
    let link = url;
    if (url === null) {
      link = route('interesting.get');
    }
    setLoadingRefresh(true)
    setInterestData(null)
    const data = await axios.get(link)
    const obj = await data.data
    setInterestData(obj)
    setLoadingRefresh(false)
  }

  useEffect(() => {
    getInteresting(route('interesting.get'))
  }, [])

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={<Breadcrumbs breadcrumbs={props.breadcrumbs} />}
    >
      <Header title={props.title} description={props.description} />
      {/* Page title starts */}
      <div className="">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="my-6 lg:my-2 container mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
            <div>
              <HeaderBreadcrumbs dateTimeFromServer={props.on_date} />
            </div>
            <div className="mt-6 lg:mt-0">
              <RefreshAndBack
                isLoadingRefesh={isLoadingRefesh}
                reloadData={() => getInteresting(null)}
              />
            </div>
          </div>
          {/* Page title ends */}
          <div className="container mx-auto">
            <div className="w-full rounded">
              {!interestData && <Skeletons />}
              {interestData && (
                <InterestingTableView
                  interesting={interestData}
                  clickNextPage={(url) => getInteresting(url)}
                />
              )}
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

export default Interesting
